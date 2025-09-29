<?php
// File: app/Http/Livewire/TaxpayerLookup.php

namespace App\Http\Livewire;

use App\Services\TaxpayerClient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class TaxpayerLookup extends Component
{
    /** Digits-only TIN, 9–12 length. */
    #[Validate('required|digits_between:9,12')]
    public string $tin = '';

    /** Summary result payload (mapped). */
    public ?array $result = null;

    /** User-friendly error message. */
    public ?string $error = null;

    /**
     * Prefill from query (/tin-checker?tin=...) and auto-run.
     * Why: enables deep links and seamless hero CTA flow.
     */
    public function mount(?string $tin = null): void
    {
        if ($tin !== null) {
            $this->tin = preg_replace('/\D+/', '', (string) $tin) ?? '';
            if ($this->tin !== '') {
                $this->lookup();
            }
        }
    }

    /**
     * Validate input, contact service, map to summary fields.
     * Errors are surfaced without throwing.
     */
    public function lookup(): void
    {
        $this->reset(['result', 'error']);
        $this->validate();

        try {
            $client = app(TaxpayerClient::class);
            $payload = $client->fetchByTin($this->tin);

            if (!$payload) {
                $this->error = 'Service unavailable.';
                return;
            }

            if (($payload['resultCode'] ?? null) !== 'SUCCESS') {
                $this->error = 'Lookup failed.';
                return;
            }

            if (empty($payload['taxpayerDetails'])) {
                $this->result = [
                    'is_valid' => false,
                    'business_name' => null,
                    'registration_year' => null,
                    'contact_email' => null,
                    'status' => 'NOT FOUND',
                    'raw' => null,
                ];
                return;
            }

            $this->result = TaxpayerClient::summarize($payload);
        } catch (\Throwable $e) {
            // why: protect UX; avoid leaking internal errors to end users
            $this->error = 'Unexpected error.';
        }
    }

    public function render()
    {
        return view('livewire.taxpayer-lookup', [
            'title' => 'Validate a TIN — NRA Due Diligence',
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Services\TaxpayerClient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class TaxpayerLookup extends Component
{
    #[Validate('required|digits_between:9,12')]
    public string $tin = '';
    public ?array $result = null;
    public ?string $error = null;

    public function lookup(): void
    {
        $this->reset(['result','error']);
        $this->validate();

        try {
            $payload = app(TaxpayerClient::class)->fetchByTin($this->tin);
            if (!$payload) { $this->error = 'Service unavailable.'; return; }
            if (($payload['resultCode'] ?? null) !== 'SUCCESS') { $this->error = 'Lookup failed.'; return; }
            if (empty($payload['taxpayerDetails'])) {
                $this->result = ['is_valid'=>false,'business_name'=>null,'registration_year'=>null,'contact_email'=>null,'status'=>'NOT FOUND','raw'=>null];
                return;
            }
            $this->result = TaxpayerClient::summarize($payload);
        } catch (\Throwable) {
            $this->error = 'Unexpected error.';
        }
    }

    public function render() { return view('livewire.taxpayer-lookup'); }
}
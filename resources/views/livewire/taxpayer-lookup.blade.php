@php $badge = fn($ok) => $ok ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; @endphp

<div class="mx-auto max-w-xl p-6">
    <h1 class="text-2xl font-semibold mb-1">Validate a TIN</h1>
    <p class="text-sm text-gray-600 mb-4">Enter a Taxpayer Identification Number for bidders, suppliers, or contractors.</p>

    <form wire:submit.prevent="lookup" class="space-y-4">
        <div>
            <label for="tin" class="block text-sm font-medium text-gray-700">Enter TIN</label>
            <input wire:model.defer="tin" id="tin" type="text" inputmode="numeric" autocomplete="off"
                   class="mt-1 block w-full rounded-md border border-gray-300 p-2" placeholder="e.g. 1000039609" />
            @error('tin') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="rounded-md bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">
            <span wire:loading.remove>Validate</span>
            <span wire:loading>Checking…</span>
        </button>
        <span wire:loading class="text-sm text-gray-500 ml-2">Contacting service…</span>
    </form>

    @if($error)
        <div class="mt-6 rounded-md border border-red-200 bg-red-50 p-4 text-red-800">{{ $error }}</div>
    @endif

    @if($result)
        <div class="mt-6 rounded-md border p-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Result</h2>
                <span class="text-xs px-2 py-1 rounded {{ $badge($result['is_valid']) }}">
                    {{ $result['is_valid'] ? 'Valid & Registered' : 'Not Registered / Inactive' }}
                </span>
            </div>

            <dl class="mt-4 space-y-2">
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Business Name</dt>
                    <dd class="text-sm font-medium">{{ $result['business_name'] ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Registration Year</dt>
                    <dd class="text-sm font-medium">{{ $result['registration_year'] ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Contact Email</dt>
                    <dd class="text-sm font-medium">
                        @if(!empty($result['contact_email']))
                            <a href="mailto:{{ $result['contact_email'] }}" class="underline">{{ $result['contact_email'] }}</a>
                        @else — @endif
                    </dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Status</dt>
                    <dd class="text-sm font-medium">{{ $result['status'] ?? '—' }}</dd>
                </div>
            </dl>

            @if(!empty($result['raw']))
            <details class="mt-4">
                <summary class="cursor-pointer text-sm text-gray-600">Raw details</summary>
                <pre class="mt-2 overflow-x-auto rounded bg-gray-50 p-3 text-xs">{{ json_encode($result['raw'], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) }}</pre>
            </details>
            @endif
        </div>
    @endif
</div>
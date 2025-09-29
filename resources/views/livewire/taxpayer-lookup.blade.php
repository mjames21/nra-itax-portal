<div>
    <!-- HERO -->
    <section class="relative overflow-hidden bg-gradient-to-b from-slate-900 to-blue-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="max-w-3xl">
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                    Validate a TIN
                </h1>
                <p class="mt-4 text-lg text-blue-100/95">
                    Check if a Taxpayer Identification Number (TIN) is valid and mapped to the
                    current business profile in the NRA registry. Confirm registration status,
                    compliance, and contact details before awarding or onboarding.
                </p>
            </div>
        </div>
    </section>

    <!-- LOOKUP FORM -->
    <section class="bg-white">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 -mt-12">
            <div class="rounded-2xl border bg-white shadow-sm p-8">
                <form wire:submit.prevent="lookup" class="space-y-6">
                    <div>
                        <label for="tin" class="block text-sm font-medium text-gray-700">Enter TIN</label>
                        <input
                            id="tin"
                            type="text"
                            wire:model.defer="tin"
                            placeholder="e.g. 1000039609"
                            class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-600 focus:ring-blue-600 sm:text-sm"
                        />
                        @error('tin')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center rounded-xl bg-blue-700 px-6 py-3 text-white font-semibold shadow hover:bg-blue-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600"
                        >
                            Validate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- RESULTS -->
    @if($error)
        <section class="bg-red-50">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 py-6">
                <div class="rounded-xl bg-red-100 border border-red-200 p-4 text-red-800">
                    {{ $error }}
                </div>
            </div>
        </section>
    @endif

    @if($result)
        <section class="bg-gray-50">
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid gap-6 lg:grid-cols-3">
                    <!-- Business Info -->
                    <div class="rounded-2xl border bg-white p-6 shadow-sm">
                        <div class="text-sm font-semibold text-gray-500">Business</div>
                        <div class="mt-2 text-lg font-bold text-gray-900">
                            {{ $result['business_name'] ?? 'N/A' }}
                        </div>
                        <p class="mt-1 text-sm text-gray-600">TIN: {{ $result['tin'] ?? $tin }}</p>
                        <p class="mt-1 text-sm text-gray-600">Registered: {{ $result['registration_year'] ?? 'N/A' }}</p>
                    </div>

                    <!-- Status -->
                    <div class="rounded-2xl border bg-white p-6 shadow-sm">
                        <div class="text-sm font-semibold text-gray-500">Status</div>
                        <div class="mt-2 text-lg font-bold text-gray-900">
                            {{ $result['status'] ?? 'N/A' }}
                        </div>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $result['is_valid'] ? 'Valid and mapped' : 'Not found / Invalid' }}
                        </p>
                    </div>

                    <!-- Contact -->
                    <div class="rounded-2xl border bg-white p-6 shadow-sm">
                        <div class="text-sm font-semibold text-gray-500">Contact</div>
                        <div class="mt-2 text-lg font-bold text-gray-900">
                            {{ $result['contact_email'] ?? 'N/A' }}
                        </div>
                        <p class="mt-1 text-sm text-gray-600">Primary email on file</p>
                    </div>
                </div>

                <!-- Raw payload toggle -->
                @if($result['raw'])
                    <details class="mt-10 rounded-xl border bg-white p-5 shadow-sm">
                        <summary class="cursor-pointer font-medium text-gray-800">View full registry record</summary>
                        <pre class="mt-4 overflow-x-auto text-sm text-gray-700">{{ json_encode($result['raw'], JSON_PRETTY_PRINT) }}</pre>
                    </details>
                @endif
            </div>
        </section>
    @endif
</div>

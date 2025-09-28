@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 -top-24 -z-10 h-72 bg-gradient-to-b from-blue-900 to-blue-700"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14 sm:py-20 text-white">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
            <div>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    Validate your bidders, suppliers, and contractors—fast.
                </h1>
                <p class="mt-4 text-blue-100 max-w-prose">
                    Perform due diligence with authoritative checks from the NRA. Confirm a business is legitimate, registered, and active—before you award or onboard. Enable ease of doing business with confidence.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('tin.checker') }}" class="inline-flex items-center rounded-md bg-white px-5 py-3 text-blue-900 font-semibold shadow hover:bg-blue-50">Validate a TIN</a>
                    <a href="#why-verify" class="inline-flex items-center rounded-md ring-1 ring-white/40 px-5 py-3 text-white hover:bg-white/10">Why verify</a>
                </div>
                <dl class="mt-10 grid grid-cols-3 gap-4 max-w-md text-center">
                    <div class="rounded-lg bg-white/10 p-4 ring-1 ring-white/15">
                        <dt class="text-[11px] uppercase tracking-wide text-blue-100">Legitimacy</dt>
                        <dd class="text-lg font-semibold">Registered</dd>
                    </div>
                    <div class="rounded-lg bg-white/10 p-4 ring-1 ring-white/15">
                        <dt class="text-[11px] uppercase tracking-wide text-blue-100">Status</dt>
                        <dd class="text-lg font-semibold">Active</dd>
                    </div>
                    <div class="rounded-lg bg-white/10 p-4 ring-1 ring-white/15">
                        <dt class="text-[11px] uppercase tracking-wide text-blue-100">Compliance</dt>
                        <dd class="text-lg font-semibold">In Good Standing</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur p-6">
                <div class="flex items-center justify-between">
                    <div class="font-semibold">Due Diligence Console</div>
                    <span class="text-xs rounded-full bg-emerald-100/20 text-emerald-200 px-2 py-0.5">Secure</span>
                </div>
                <ul class="mt-6 space-y-3 text-sm text-blue-50">
                    <li class="flex items-center justify-between rounded-md bg-white/5 p-3 ring-1 ring-white/10">
                        <div>
                            <div class="font-medium text-white">Instant TIN Validation</div>
                            <p class="text-blue-200">Verify registration, activity status, and contact.</p>
                        </div>
                        <a href="{{ route('tin.checker') }}" class="ml-4 whitespace-nowrap rounded-md bg-white px-3 py-2 text-blue-900 font-semibold hover:bg-blue-50">Open</a>
                    </li>
                    <li class="flex items-center justify-between rounded-md bg-white/5 p-3 ring-1 ring-white/10">
                        <div>
                            <div class="font-medium text-white">Procurement Assurance</div>
                            <p class="text-blue-200">Reduce risk before awarding contracts or onboarding vendors.</p>
                        </div>
                        <a href="#" class="ml-4 whitespace-nowrap rounded-md ring-1 ring-white/30 px-3 py-2 hover:bg-white/10">Learn</a>
                    </li>
                    <li class="flex items-center justify-between rounded-md bg-white/5 p-3 ring-1 ring-white/10">
                        <div>
                            <div class="font-medium text-white">Compliance-by-Design</div>
                            <p class="text-blue-200">Aligned with NRA policies and public sector controls.</p>
                        </div>
                        <a href="#" class="ml-4 whitespace-nowrap rounded-md ring-1 ring-white/30 px-3 py-2 hover:bg-white/10">Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section id="why-verify" class="bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-2xl font-bold">Why verification matters</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl border bg-white p-5">
                    <div class="text-sm font-semibold">Prevent Fraud</div>
                    <p class="mt-2 text-sm text-gray-600">Ensure only legitimate entities participate in tenders and awards.</p>
                </div>
                <div class="rounded-xl border bg-white p-5">
                    <div class="text-sm font-semibold">Enforce Compliance</div>
                    <p class="mt-2 text-sm text-gray-600">Confirm registration and tax status at the source.</p>
                </div>
                <div class="rounded-xl border bg-white p-5">
                    <div class="text-sm font-semibold">Faster Procurement</div>
                    <p class="mt-2 text-sm text-gray-600">Automate initial checks to speed up evaluation cycles.</p>
                </div>
                <div class="rounded-xl border bg-white p-5">
                    <div class="text-sm font-semibold">Audit Ready</div>
                    <p class="mt-2 text-sm text-gray-600">Maintain a transparent trail of verification outcomes.</p>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
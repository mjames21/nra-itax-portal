@extends('layouts.app')

@section('content')
<!-- HERO (clean, balanced) -->
<section class="relative overflow-hidden bg-gradient-to-b from-slate-900 to-blue-900 text-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-24 pb-24">
    <div class="grid gap-10 lg:grid-cols-12 lg:items-center">
      <div class="lg:col-span-7">
        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight tracking-tight">
          Validate your bidders, suppliers, and contractors—fast.
        </h1>
        <p class="mt-5 text-blue-100/95 text-lg max-w-2xl">
          Perform due diligence with authoritative checks from the National Revenue Authority. Confirm a business is legitimate, registered, and active—before you award or onboard.
        </p>
        <div class="mt-8">
          <a href="{{ route('tin.checker') }}"
             class="inline-flex items-center rounded-xl bg-white px-6 py-3 text-blue-900 font-semibold shadow hover:bg-blue-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white">
            Validate a TIN
          </a>
        </div>

        <!-- Compact signals -->
        <div class="mt-10 grid grid-cols-3 gap-4 max-w-lg">
          <div class="rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
            <div class="text-[11px] uppercase tracking-widest text-blue-100">Legitimacy</div>
            <div class="mt-1 text-lg font-semibold">Registered</div>
          </div>
          <div class="rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
            <div class="text-[11px] uppercase tracking-widest text-blue-100">Status</div>
            <div class="mt-1 text-lg font-semibold">Active</div>
          </div>
          <div class="rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
            <div class="text-[11px] uppercase tracking-widest text-blue-100">Compliance</div>
            <div class="mt-1 text-lg font-semibold">In Good Standing</div>
          </div>
        </div>
      </div>

      <!-- Minimal supporting card -->
      <div class="lg:col-span-5">
        <div class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm">
          <div class="font-semibold">Due Diligence Highlights</div>
          <ul class="mt-4 space-y-3 text-sm text-blue-100">
            <li class="rounded-lg bg-white/5 p-3 ring-1 ring-white/10">
              <span class="font-medium text-white">Instant TIN Validation</span>
              <p class="text-blue-200">Verify registration, activity status, and contact.</p>
            </li>
            <li class="rounded-lg bg-white/5 p-3 ring-1 ring-white/10">
              <span class="font-medium text-white">Procurement Assurance</span>
              <p class="text-blue-200">Reduce risk before awarding contracts or onboarding vendors.</p>
            </li>
            <li class="rounded-lg bg-white/5 p-3 ring-1 ring-white/10">
              <span class="font-medium text-white">Compliance-by-Design</span>
              <p class="text-blue-200">Aligned with NRA policies and public sector controls.</p>
            </li>
          </ul>
          <div class="mt-5">
            <a href="{{ route('tin.checker') }}"
               class="inline-flex items-center rounded-md bg-white px-3 py-2 text-blue-900 font-semibold hover:bg-blue-50">
              Open Console
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BENEFITS -->
<section id="why" class="bg-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
    <div class="max-w-3xl">
      <h2 class="text-3xl font-bold tracking-tight">Why verification matters</h2>
      <p class="mt-3 text-gray-600">Stronger procurement outcomes with clarity and confidence.</p>
    </div>

    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @php
        $features = [
          ['Prevent Fraud','Ensure only legitimate entities participate in tenders and awards.','M5 12l4 4L19 6'],
          ['Enforce Compliance','Confirm registration and tax status at the source.','M4 12h16M12 4v16'],
          ['Faster Procurement','Automate initial checks to speed evaluation cycles.','M13 7h6m0 0v6m0-6L10 16'],
          ['Audit Ready','Maintain a transparent trail of verification outcomes.','M7 8h10M7 12h6M5 6h14v12H5z'],
        ];
      @endphp
      @foreach($features as [$title,$desc,$icon])
        <div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center gap-3">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-700">
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="{{ $icon }}" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <div class="font-semibold">{{ $title }}</div>
          </div>
          <p class="mt-3 text-sm text-gray-600">{{ $desc }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- COMPLIANCE SIGNALS -->
<section class="bg-gray-50">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
    <div class="max-w-3xl">
      <h2 class="text-3xl font-bold tracking-tight">What you’ll see</h2>
      <p class="mt-3 text-gray-600">Clear compliance signals to support award decisions.</p>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
      <div class="rounded-2xl border bg-white p-6">
        <div class="font-semibold">Registration</div>
        <ul class="mt-3 text-sm text-gray-700 list-disc pl-5 space-y-1">
          <li>Business name &amp; TIN</li>
          <li>Registration year</li>
          <li>Assigned tax office</li>
        </ul>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="font-semibold">Status</div>
        <ul class="mt-3 text-sm text-gray-700 list-disc pl-5 space-y-1">
          <li>Registered / Active indicators</li>
          <li>Account standing</li>
          <li>Primary address</li>
        </ul>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="font-semibold">Contact</div>
        <ul class="mt-3 text-sm text-gray-700 list-disc pl-5 space-y-1">
          <li>Primary email</li>
          <li>Contact purpose</li>
          <li>Effective dates</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- CTA BAND -->
<section class="relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-700"></div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col items-start justify-between gap-6 rounded-2xl bg-white/10 p-8 ring-1 ring-white/20 backdrop-blur lg:flex-row lg:items-center">
      <div>
        <h3 class="text-2xl font-bold text-white">Ready to validate your next bidder?</h3>
        <p class="mt-1 text-blue-100">Run a quick compliance check before award or onboarding.</p>
      </div>
      <a href="{{ route('tin.checker') }}" class="inline-flex items-center rounded-xl bg-white px-6 py-3 text-blue-900 font-semibold shadow hover:bg-blue-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white">
        Start a Verification
      </a>
    </div>
  </div>
</section>

<!-- FAQ (minimal, tidy) -->
<section class="bg-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
    <div class="max-w-3xl">
      <h2 class="text-3xl font-bold tracking-tight">Frequently asked questions</h2>
      <p class="mt-3 text-gray-600">Quick answers about verification and usage.</p>
    </div>

    <div class="mt-8 space-y-4">
      @php
        $faqs = [
          ['What information is returned?','Registration indicators, activity status, contact details, and basic profile signals.'],
          ['Who can use this portal?','Institutions and businesses conducting due diligence on bidders, suppliers, or contractors.'],
          ['Do I need consent to verify?','Ensure you have authority or legitimate interest per procurement and privacy policies.'],
        ];
      @endphp
      @foreach($faqs as [$q,$a])
        <details class="group rounded-2xl border bg-white p-5 open:shadow-sm">
          <summary class="flex cursor-pointer list-none items-center justify-between">
            <span class="font-medium">{{ $q }}</span>
            <span class="ml-4 rounded-full border px-2 text-xs text-gray-600 group-open:rotate-45 transition">+</span>
          </summary>
          <p class="mt-3 text-sm text-gray-600">{{ $a }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>
@endsection

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? 'NRA Due Diligence — Verify Bidders & Suppliers' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  @livewireStyles
  <style>
    .hero-surface{background-image:
      radial-gradient(1200px 600px at 0% -10%, rgba(59,130,246,.30), transparent 55%),
      radial-gradient(900px 500px at 100% -20%, rgba(29,78,216,.38), transparent 60%),
      linear-gradient(180deg, #0b1220, #1e3a8a);}
    .grain:before{content:"";position:absolute;inset:-50%;opacity:.05;pointer-events:none;
      background:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3CfeColorMatrix type='saturate' values='0'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E") repeat;}
    @media (prefers-reduced-motion:no-preference){
      .fade-in{animation:fade .6s ease-out both}
      @keyframes fade{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
    }
  </style>
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">
<header class="sticky top-0 z-50 border-b bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <a href="{{ route('home') }}" class="group inline-flex items-center gap-3 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-700 rounded">
        <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-700 text-white shadow-sm group-hover:scale-105 transition">
          <svg viewBox="0 0 24 24" class="h-5 w-5" aria-hidden="true">
            <circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.5"/>
            <path d="M7 13.5L11 17.5L17 7.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="leading-tight">
          <span class="block font-semibold tracking-wide">National Revenue Authority</span>
          <span class="block text-xs text-gray-500 -mt-0.5">Due Diligence &amp; Compliance Portal</span>
        </span>
      </a>
      <nav class="flex items-center gap-6 text-sm">
        <a href="{{ route('home') }}" class="hover:text-blue-700">Home</a>
        <a href="{{ route('tin.checker') }}" class="font-medium text-blue-700 hover:text-blue-800">Validate TIN</a>
        <a href="#" class="hover:text-blue-700">Guidelines</a>
        <a href="#" class="hover:text-blue-700">Help</a>
      </nav>
    </div>
  </div>
</header>

<main id="main" role="main" class="min-h-[70vh]">
  {{ $slot ?? '' }}
  @yield('content')
</main>

<footer class="border-t bg-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid gap-8 sm:grid-cols-3">
      <div>
        <div class="font-semibold">National Revenue Authority</div>
        <p class="mt-2 text-sm text-gray-600">Authoritative verification for businesses in public and private procurement.</p>
      </div>
      <div>
        <div class="text-sm font-semibold">Quick Links</div>
        <ul class="mt-3 space-y-2 text-sm">
          <li><a href="{{ route('tin.checker') }}" class="hover:text-blue-800">Validate a TIN</a></li>
          <li><a href="#" class="hover:text-blue-800">Procurement Guidelines</a></li>
          <li><a href="#" class="hover:text-blue-800">Compliance Policies</a></li>
          <li><a href="#" class="hover:text-blue-800">Report an Issue</a></li>
        </ul>
      </div>
      <div>
        <div class="text-sm font-semibold">Contact</div>
        <p class="mt-3 text-sm text-gray-600">20—22 Wellington St, Freetown<br>+232 (0) 00 000000<br>support@nra.gov.sl</p>
      </div>
    </div>
    <div class="mt-8 border-t pt-6 text-xs text-gray-500 flex flex-wrap items-center justify-between gap-3">
      <span>&copy; {{ now()->year }} National Revenue Authority. All rights reserved.</span>
      <div class="flex items-center gap-4">
        <a href="#" class="hover:text-gray-700">Privacy</a>
        <a href="#" class="hover:text-gray-700">Terms</a>
        <span>Timezone: {{ config('app.timezone','Africa/Freetown') }}</span>
      </div>
    </div>
  </div>
</footer>

@livewireScripts
</body>
</html>

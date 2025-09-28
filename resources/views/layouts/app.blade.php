<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'NRA Due Diligence — Verify Bidders & Suppliers' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">
    <header class="border-b bg-gradient-to-r from-slate-900 to-blue-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-white/10 ring-1 ring-white/20">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5 text-white">
                            <circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M7 13.5L11 17.5L17 7.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <div class="leading-tight">
                        <div class="font-semibold tracking-wide">National Revenue Authority</div>
                        <div class="text-xs text-white/80">Due Diligence & Compliance Portal</div>
                    </div>
                </a>
                <nav class="flex items-center gap-6 text-sm">
                    <a href="{{ route('home') }}" class="text-white/90 hover:text-white">Home</a>
                    <a href="{{ route('tin.checker') }}" class="text-white hover:underline font-medium">Validate TIN</a>
                    <a href="#" class="text-white/90 hover:text-white">Guidelines</a>
                    <a href="#" class="text-white/90 hover:text-white">Help</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="min-h-[70vh]">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="border-t bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid gap-8 sm:grid-cols-3">
                <div>
                    <div class="font-semibold">National Revenue Authority</div>
                    <p class="mt-2 text-sm text-gray-600">Verify business registration and compliance status.</p>
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
                    <p class="mt-3 text-sm text-gray-600">
                        20—22 Wellington St, Freetown<br>
                        +232 (0) 00 000000<br>
                        support@nra.gov.sl
                    </p>
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

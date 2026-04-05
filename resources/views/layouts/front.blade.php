<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Event Management') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        :root {
            --brand-start: #8a5cf6;
            --brand-end: #00c2ff;
        }
        body { font-family: 'Manrope', system-ui, -apple-system, sans-serif; background: #0f172a; color: #e2e8f0; }
        .glass { backdrop-filter: blur(12px); background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.08); }
        .gradient-btn { background: linear-gradient(120deg, var(--brand-start), var(--brand-end)); color: #0b1220; box-shadow: 0 10px 30px rgba(0,194,255,0.25); }
        .gradient-border { position: relative; }
        .gradient-border::before { content:''; position:absolute; inset:-1px; border-radius:18px; padding:1px; background:linear-gradient(120deg,var(--brand-start),var(--brand-end)); -webkit-mask:linear-gradient(#000,#000) content-box,linear-gradient(#000,#000); -webkit-mask-composite:xor; mask-composite: exclude; }
    </style>
</head>
<body class="antialiased">
    <div class="fixed inset-x-0 top-0 z-40 bg-[#0b1220]/60 glass border-b border-white/5" x-data="{open:false, scrolled:false}" @scroll.window="scrolled = (window.scrollY > 10)">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            {{-- <a href="/" class="text-lg font-bold tracking-tight">Eventora<span class="text-cyan-300">.</span></a> --}}
            <a href="/" class="text-lg font-bold tracking-tight">Urban Caters<span class="text-cyan-300">.</span></a>
            <div class="hidden md:flex items-center space-x-6 text-sm">
                <a href="/" class="hover:text-white {{ request()->is('/') ? 'text-white font-semibold' : 'text-slate-300' }}">Home</a>
                <a href="/about" class="hover:text-white {{ request()->is('about') ? 'text-white font-semibold' : 'text-slate-300' }}">About</a>
                <a href="/events" class="hover:text-white {{ request()->is('events*') ? 'text-white font-semibold' : 'text-slate-300' }}">Events</a>
                <a href="/contact" class="hover:text-white {{ request()->is('contact') ? 'text-white font-semibold' : 'text-slate-300' }}">Contact</a>
                <a href="/admin/login" class="text-slate-400 hover:text-white">Admin</a>
                <a href="/contact" class="gradient-btn px-4 py-2 rounded-full text-sm font-semibold">Book an Event</a>
            </div>
            <button class="md:hidden" @click="open=!open">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div x-show="open" x-cloak class="md:hidden px-4 pb-4 space-y-2">
            <a href="/" class="block">Home</a>
            <a href="/about" class="block">About</a>
            <a href="/events" class="block">Events</a>
            <a href="/contact" class="block">Contact</a>
        </div>
    </div>

    <main class="pt-24">
        @yield('content')
    </main>

    <footer class="mt-20 border-t border-white/5 bg-[#0b1220]">
        <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-10">
            <div>
                <div class="text-xl font-bold">Eventora</div>
                <p class="text-slate-400 mt-3">Boutique event partners crafting unforgettable experiences across weddings, corporate, and live entertainment.</p>
            </div>
            <div>
                <div class="text-sm uppercase text-slate-500">Explore</div>
                <div class="mt-3 flex flex-col space-y-2 text-slate-300">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/events">Events</a>
                    <a href="/contact">Contact</a>
                </div>
            </div>
            <div>
                <div class="text-sm uppercase text-slate-500">Contact</div>
                <p class="text-slate-300 mt-3">hello@eventora.test<br>+1 (555) 123-4400<br>Mumbai � Remote worldwide</p>
            </div>
        </div>
        <div class="border-t border-white/5 text-center text-slate-500 py-4 text-sm">� {{ date('Y') }} Eventora Events. All rights reserved.</div>
    </footer>
</body>
</html>

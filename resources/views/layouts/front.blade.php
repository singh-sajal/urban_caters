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
            --front-bg: #0f172a;
            --front-ink: #e2e8f0;
            --front-nav-bg: rgba(11, 18, 32, 0.72);
            --front-footer-bg: #0b1220;
            --front-panel: rgba(255, 255, 255, 0.07);
            --front-panel-border: rgba(255, 255, 255, 0.08);
            --front-soft-block: rgba(255, 255, 255, 0.05);
        }

        html[data-theme='light'] {
            --front-bg: #f7fafc;
            --front-ink: #0f172a;
            --front-nav-bg: rgba(255, 255, 255, 0.82);
            --front-footer-bg: #eef2f7;
            --front-panel: rgba(255, 255, 255, 0.86);
            --front-panel-border: rgba(148, 163, 184, 0.32);
            --front-soft-block: rgba(15, 23, 42, 0.05);
        }

        body {
            font-family: 'Manrope', system-ui, -apple-system, sans-serif;
            background: var(--front-bg);
            color: var(--front-ink);
            transition: background-color 180ms ease, color 180ms ease;
        }

        .site-nav {
            background: var(--front-nav-bg);
            border-bottom-color: var(--front-panel-border);
        }

        .site-footer {
            background: var(--front-footer-bg);
            border-top-color: var(--front-panel-border);
        }

        .glass { backdrop-filter: blur(12px); background: var(--front-panel); border: 1px solid var(--front-panel-border); }
        .gradient-btn { background: linear-gradient(120deg, var(--brand-start), var(--brand-end)); color: #0b1220; box-shadow: 0 10px 30px rgba(0,194,255,0.25); }
        .gradient-border { position: relative; }
        .gradient-border::before { content:''; position:absolute; inset:-1px; border-radius:18px; padding:1px; background:linear-gradient(120deg,var(--brand-start),var(--brand-end)); -webkit-mask:linear-gradient(#000,#000) content-box,linear-gradient(#000,#000); -webkit-mask-composite:xor; mask-composite: exclude; }

        .theme-toggle {
            border: 1px solid var(--front-panel-border);
            background: var(--front-panel);
            color: inherit;
            border-radius: 999px;
            padding: 0.45rem 0.8rem;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .theme-toggle svg {
            width: 1rem;
            height: 1rem;
        }

        html[data-theme='light'] .text-slate-300 { color: #334155 !important; }
        html[data-theme='light'] .text-slate-400 { color: #475569 !important; }
        html[data-theme='light'] .text-slate-500 { color: #64748b !important; }
        html[data-theme='light'] .text-white { color: #0f172a !important; }
        html[data-theme='light'] .border-white\/5,
        html[data-theme='light'] .border-white\/10,
        html[data-theme='light'] .border-white\/20,
        html[data-theme='light'] .hover\:border-white\/50:hover {
            border-color: rgba(148, 163, 184, 0.35) !important;
        }
        html[data-theme='light'] .bg-white\/5 { background: var(--front-soft-block) !important; }
        html[data-theme='light'] .bg-white\/10 {
            background: rgba(15, 23, 42, 0.05) !important;
            color: #0f172a !important;
        }
        html[data-theme='light'] .group-hover\:text-white:hover { color: #0f172a !important; }
    </style>
</head>
<body class="antialiased">
    @php
        $brandName = config('app.name', 'Urban Caters');
        $logoUrl = !empty($siteSettings?->logo) ? asset('storage/'.$siteSettings->logo) : null;
        $shortLogoUrl = !empty($siteSettings?->short_logo) ? asset('storage/'.$siteSettings->short_logo) : null;
        $contactEmail = $siteSettings?->contact_email ?: 'hello@eventora.test';
        $contactPhone = $siteSettings?->contact_phone ?: '+1 (555) 123-4400';
        $contactAddress = $siteSettings?->contact_address ?: 'Mumbai - Remote worldwide';
    @endphp

    <div class="site-nav fixed inset-x-0 top-0 z-40 glass border-b" x-data="{open:false, scrolled:false}" @scroll.window="scrolled = (window.scrollY > 10)">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="/" class="text-lg font-bold tracking-tight flex items-center gap-2">
                @if($shortLogoUrl)
                    <img src="{{ $shortLogoUrl }}" alt="Short logo" class="h-8 w-8 rounded-lg object-cover">
                @else
                    <span>{{ $brandName }}</span><span class="text-cyan-300">.</span>
                @endif
            </a>
            <div class="hidden md:flex items-center space-x-6 text-sm">
                <a href="/" class="hover:text-white {{ request()->is('/') ? 'text-white font-semibold' : 'text-slate-300' }}">Home</a>
                <a href="/about" class="hover:text-white {{ request()->is('about') ? 'text-white font-semibold' : 'text-slate-300' }}">About</a>
                <a href="/events" class="hover:text-white {{ request()->is('events*') ? 'text-white font-semibold' : 'text-slate-300' }}">Events</a>
                <a href="/contact" class="hover:text-white {{ request()->is('contact') ? 'text-white font-semibold' : 'text-slate-300' }}">Contact</a>
                <a href="/admin/login" class="text-slate-400 hover:text-white">Admin</a>
                <button type="button" class="theme-toggle" data-theme-toggle>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12.79A9 9 0 1111.21 3c0 0-1.71 6.29 3.79 11.79S21 12.79 21 12.79z" /></svg>
                    <span data-theme-label>Dark</span>
                </button>
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
            <button type="button" class="theme-toggle" data-theme-toggle>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12.79A9 9 0 1111.21 3c0 0-1.71 6.29 3.79 11.79S21 12.79 21 12.79z" /></svg>
                <span data-theme-label>Dark</span>
            </button>
        </div>
    </div>

    <main class="pt-24">
        @yield('content')
    </main>

    <footer class="site-footer mt-20 border-t">
        <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-10">
            <div>
                @if($logoUrl)
                    <img src="{{ $logoUrl }}" alt="Logo" class="h-10 object-contain">
                @else
                    <div class="text-xl font-bold">{{ $brandName }}</div>
                @endif
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
                <p class="text-slate-300 mt-3">{{ $contactEmail }}<br>{{ $contactPhone }}<br>{{ $contactAddress }}</p>
            </div>
        </div>
        <div class="border-t border-white/5 text-center text-slate-500 py-4 text-sm">&copy; {{ date('Y') }} {{ $brandName }}. All rights reserved.</div>
    </footer>

    <script>
        (function () {
            const root = document.documentElement;
            const key = 'urban_front_theme';

            const preferred = localStorage.getItem(key);
            const initialTheme = preferred || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            const applyTheme = (theme) => {
                root.setAttribute('data-theme', theme);
                localStorage.setItem(key, theme);
                document.querySelectorAll('[data-theme-label]').forEach((el) => {
                    el.textContent = theme === 'dark' ? 'Dark' : 'Light';
                });
            };

            applyTheme(initialTheme);

            document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
                button.addEventListener('click', () => {
                    const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                    applyTheme(nextTheme);
                });
            });
        })();
    </script>
</body>
</html>

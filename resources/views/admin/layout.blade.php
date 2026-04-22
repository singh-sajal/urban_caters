<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ config('app.name', 'Eventora') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Space Grotesk', 'sans-serif'],
                    },
                    boxShadow: {
                        soft: '0 12px 30px -15px rgba(15, 23, 42, 0.3)',
                    },
                },
            },
        };
    </script>
    <style>
        :root {
            --app-bg-1: #f7f5ef;
            --app-bg-2: #eff7ff;
            --card: rgba(255, 255, 255, 0.76);
            --card-strong: rgba(255, 255, 255, 0.92);
            --line: rgba(71, 85, 105, 0.18);
            --ink: #0f172a;
            --muted: #475569;
            --brand: #0ea5e9;
            --accent: #14b8a6;
        }

        html[data-theme='dark'] {
            --app-bg-1: #020617;
            --app-bg-2: #0f172a;
            --card: rgba(15, 23, 42, 0.74);
            --card-strong: rgba(15, 23, 42, 0.9);
            --line: rgba(148, 163, 184, 0.24);
            --ink: #e2e8f0;
            --muted: #94a3b8;
            --brand: #38bdf8;
            --accent: #2dd4bf;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 0% 0%, rgba(20, 184, 166, 0.18), transparent 38%),
                radial-gradient(circle at 100% 0%, rgba(14, 165, 233, 0.18), transparent 40%),
                linear-gradient(145deg, var(--app-bg-1), var(--app-bg-2));
        }

        .glass {
            background: var(--card);
            border: 1px solid var(--line);
            backdrop-filter: blur(12px);
        }

        .panel {
            background: var(--card-strong);
            border: 1px solid var(--line);
            border-radius: 1rem;
            box-shadow: 0 10px 30px -22px rgba(15, 23, 42, 0.45);
        }

        .field {
            width: 100%;
            border: 1px solid rgba(148, 163, 184, 0.42);
            border-radius: 0.75rem;
            padding: 0.68rem 0.9rem;
            background: rgba(255, 255, 255, 0.95);
            transition: border-color 120ms ease, box-shadow 120ms ease;
        }

        .field:focus {
            outline: none;
            border-color: rgba(14, 165, 233, 0.85);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
        }

        .btn {
            border-radius: 0.75rem;
            padding: 0.58rem 0.95rem;
            font-size: 0.92rem;
            font-weight: 600;
            transition: all 150ms ease;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(125deg, var(--brand), var(--accent));
        }

        .btn-primary:hover {
            filter: brightness(0.96);
            transform: translateY(-1px);
        }

        .btn-ghost {
            color: var(--ink);
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(148, 163, 184, 0.28);
        }

        .btn-danger {
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.26);
            background: rgba(254, 242, 242, 0.85);
        }

        .theme-toggle {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: var(--card);
            color: var(--ink);
            padding: 0.45rem 0.8rem;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .theme-toggle svg {
            width: 1rem;
            height: 1rem;
        }

        html[data-theme='dark'] .bg-white\/70,
        html[data-theme='dark'] .bg-white\/85,
        html[data-theme='dark'] .bg-white\/80,
        html[data-theme='dark'] .bg-white\/50,
        html[data-theme='dark'] .hover\:bg-white\/80:hover,
        html[data-theme='dark'] .hover\:bg-white\/70:hover {
            background-color: rgba(15, 23, 42, 0.72) !important;
        }

        html[data-theme='dark'] .text-slate-700,
        html[data-theme='dark'] .text-slate-600,
        html[data-theme='dark'] .text-slate-500,
        html[data-theme='dark'] .text-slate-400 {
            color: #cbd5e1 !important;
        }

        html[data-theme='dark'] .border-slate-200\/50,
        html[data-theme='dark'] .border-slate-200\/60,
        html[data-theme='dark'] .border-slate-200\/70,
        html[data-theme='dark'] .border-slate-200\/75,
        html[data-theme='dark'] .border-slate-200\/80,
        html[data-theme='dark'] .border-slate-200,
        html[data-theme='dark'] .hover\:border-slate-200:hover {
            border-color: rgba(148, 163, 184, 0.24) !important;
        }

        html[data-theme='dark'] .bg-slate-50,
        html[data-theme='dark'] .bg-slate-50\/90 {
            background-color: rgba(30, 41, 59, 0.7) !important;
        }

        html[data-theme='dark'] .field {
            background: rgba(15, 23, 42, 0.9);
            color: #e2e8f0;
            border-color: rgba(148, 163, 184, 0.33);
        }

        html[data-theme='dark'] .btn-ghost {
            background: rgba(30, 41, 59, 0.75);
            color: #e2e8f0;
            border-color: rgba(148, 163, 184, 0.3);
        }

        html[data-theme='dark'] .btn-danger {
            background: rgba(69, 10, 10, 0.4);
            border-color: rgba(248, 113, 113, 0.35);
            color: #fda4af;
        }

        .fade-up {
            animation: fadeUp 360ms ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="min-h-screen">
    @php
        $brandName = config('app.name', 'Eventora');
        $shortLogoUrl = !empty($siteSettings?->short_logo) ? asset('storage/'.$siteSettings->short_logo) : null;
        $navLinks = [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard', 'active' => request()->routeIs('admin.dashboard')],
            ['route' => 'admin.events.index', 'label' => 'Events', 'icon' => 'events', 'active' => request()->routeIs('admin.events.*')],
            ['route' => 'admin.gallery.index', 'label' => 'Gallery', 'icon' => 'gallery', 'active' => request()->routeIs('admin.gallery.*')],
            ['route' => 'admin.team.index', 'label' => 'Team', 'icon' => 'team', 'active' => request()->routeIs('admin.team.*')],
            ['route' => 'admin.messages.index', 'label' => 'Messages', 'icon' => 'messages', 'active' => request()->routeIs('admin.messages.*')],
            ['route' => 'admin.settings.edit', 'label' => 'Settings', 'icon' => 'settings', 'active' => request()->routeIs('admin.settings.*')],
        ];
    @endphp

    <div class="relative min-h-screen" data-admin-shell>
        <div class="fixed inset-0 bg-slate-900/45 backdrop-blur-sm z-30 hidden lg:hidden" data-sidebar-overlay></div>

        <aside class="fixed inset-y-0 left-0 z-40 w-72 lg:w-[17rem] glass border-r border-slate-200/50 shadow-soft transition-all duration-200 -translate-x-full lg:translate-x-0" data-sidebar>
            <div class="h-16 px-4 border-b border-slate-200/60 flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    @if($shortLogoUrl)
                        <img src="{{ $shortLogoUrl }}" alt="Short logo" class="h-9 w-9 rounded-lg object-cover border border-slate-200/60">
                    @else
                        <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-sky-500 to-teal-500 text-white font-bold grid place-items-center">{{ strtoupper(substr($brandName, 0, 1)) }}</div>
                    @endif
                    <div class="sidebar-label min-w-0">
                        <p class="font-bold text-sm tracking-wide truncate">{{ $brandName }} Admin</p>
                        <p class="text-[11px] text-slate-500 truncate">Control Center</p>
                    </div>
                </div>
                <button type="button" class="lg:hidden rounded-lg p-2 hover:bg-white/70" data-sidebar-close aria-label="Close menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <nav class="p-3 space-y-1" aria-label="Admin navigation">
                @foreach($navLinks as $item)
                    <a href="{{ route($item['route']) }}"
                       class="group flex items-center gap-3 rounded-xl px-3 py-2.5 transition {{ $item['active'] ? 'bg-sky-100/70 text-sky-700 border border-sky-300/45' : 'text-slate-700 hover:bg-white/80 border border-transparent hover:border-slate-200' }}">
                        <span class="h-5 w-5 shrink-0 {{ $item['active'] ? 'text-sky-600' : 'text-slate-400 group-hover:text-sky-500' }}">
                            @if($item['icon'] === 'dashboard')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 12.75V6.75A2.75 2.75 0 016.75 4h10.5A2.75 2.75 0 0120 6.75v6m-16 0h16m-13 0v6.25m10-6.25v6.25" /></svg>
                            @elseif($item['icon'] === 'events')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 3v3m8-3v3M5.5 9.5h13M6.75 5.5h10.5A1.75 1.75 0 0119 7.25v10A1.75 1.75 0 0117.25 19h-10.5A1.75 1.75 0 015 17.25v-10A1.75 1.75 0 016.75 5.5z" /></svg>
                            @elseif($item['icon'] === 'gallery')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.75 5.5h14.5A1.75 1.75 0 0121 7.25v9.5a1.75 1.75 0 01-1.75 1.75H4.75A1.75 1.75 0 013 16.75v-9.5A1.75 1.75 0 014.75 5.5z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10.5a1.25 1.25 0 110-2.5 1.25 1.25 0 010 2.5zm13 6l-5.5-5.5L9 17.5" /></svg>
                            @elseif($item['icon'] === 'team')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 19a4 4 0 00-8 0m13 0a3 3 0 00-3-3h-1m4 3v1m-18-1v1m4-4H6a3 3 0 00-3 3m11-8a3 3 0 11-6 0 3 3 0 016 0zm7 1a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" /></svg>
                            @elseif($item['icon'] === 'settings')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317a1 1 0 011.35-.936l.645.241a1 1 0 00.76 0l.645-.24a1 1 0 011.35.935l.057.688a1 1 0 00.51.79l.594.34a1 1 0 01.366 1.366l-.34.593a1 1 0 000 .76l.34.593a1 1 0 01-.366 1.366l-.593.34a1 1 0 00-.51.79l-.058.688a1 1 0 01-1.35.936l-.645-.241a1 1 0 00-.76 0l-.645.24a1 1 0 01-1.35-.935l-.057-.688a1 1 0 00-.51-.79l-.594-.34a1 1 0 01-.366-1.366l.34-.593a1 1 0 000-.76l-.34-.593a1 1 0 01.366-1.366l.593-.34a1 1 0 00.51-.79l.058-.688z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5M6.75 4h10.5A1.75 1.75 0 0119 5.75v12.5A1.75 1.75 0 0117.25 20h-10.5A1.75 1.75 0 015 18.25V5.75A1.75 1.75 0 016.75 4z" /></svg>
                            @endif
                        </span>
                        <span class="sidebar-label text-sm font-medium">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="absolute inset-x-0 bottom-0 p-3 border-t border-slate-200/60 bg-white/50">
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="w-full btn btn-danger sidebar-button">
                        <span class="sidebar-label">Logout</span>
                        <span class="sidebar-mini hidden">Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="min-h-screen transition-all duration-200 lg:pl-[17rem]" data-main>
            <header class="sticky top-0 z-20 backdrop-blur-md bg-white/70 border-b border-slate-200/70 px-4 sm:px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-2 sm:gap-3 min-w-0">
                    <button type="button" class="btn btn-ghost !p-2 lg:hidden" data-sidebar-open aria-label="Open menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                    <button type="button" class="btn btn-ghost !p-2 hidden lg:inline-flex" data-sidebar-collapse-toggle aria-label="Collapse sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <div class="min-w-0">
                        <p class="font-semibold truncate">@yield('title')</p>
                        <p class="text-xs text-slate-500 hidden sm:block">Manage your events, media, and messages in one place.</p>
                    </div>
                </div>
                <div class="text-xs sm:text-sm text-slate-600 bg-white/85 border border-slate-200/70 rounded-full px-3 py-1">Signed in as admin</div>
                <button type="button" class="theme-toggle" data-theme-toggle>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12.79A9 9 0 1111.21 3c0 0-1.71 6.29 3.79 11.79S21 12.79 21 12.79z" /></svg>
                    <span data-theme-label>Light</span>
                </button>
            </header>

            <div class="p-4 sm:p-6 fade-up">
                @if(session('status'))
                    <div class="mb-4 panel px-4 py-3 border-emerald-200/80 bg-emerald-50/80 text-emerald-700">{{ session('status') }}</div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        (function () {
            const shell = document.querySelector('[data-admin-shell]');
            if (!shell) return;

            const sidebar = shell.querySelector('[data-sidebar]');
            const overlay = shell.querySelector('[data-sidebar-overlay]');
            const main = shell.querySelector('[data-main]');
            const openBtn = shell.querySelector('[data-sidebar-open]');
            const closeBtn = shell.querySelector('[data-sidebar-close]');
            const collapseBtn = shell.querySelector('[data-sidebar-collapse-toggle]');
            const storageKey = 'admin_sidebar_collapsed';
            const themeKey = 'urban_admin_theme';

            const applyTheme = (theme) => {
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem(themeKey, theme);
                shell.querySelectorAll('[data-theme-label]').forEach((el) => {
                    el.textContent = theme === 'dark' ? 'Dark' : 'Light';
                });
            };

            const preferredTheme = localStorage.getItem(themeKey)
                || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            applyTheme(preferredTheme);

            const collapseDesktop = (collapsed) => {
                const isDesktop = window.matchMedia('(min-width: 1024px)').matches;
                if (!isDesktop) return;

                sidebar.classList.toggle('lg:w-[17rem]', !collapsed);
                sidebar.classList.toggle('lg:w-24', collapsed);
                main.classList.toggle('lg:pl-[17rem]', !collapsed);
                main.classList.toggle('lg:pl-24', collapsed);

                shell.querySelectorAll('.sidebar-label').forEach((el) => {
                    el.classList.toggle('hidden', collapsed);
                });

                shell.querySelectorAll('.sidebar-mini').forEach((el) => {
                    el.classList.toggle('hidden', !collapsed);
                });

                collapseBtn.innerHTML = collapsed
                    ? '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5l7 7-7 7" /></svg>'
                    : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 19l-7-7 7-7" /></svg>';
            };

            const openSidebarMobile = () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            };

            const closeSidebarMobile = () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            };

            openBtn?.addEventListener('click', openSidebarMobile);
            closeBtn?.addEventListener('click', closeSidebarMobile);
            overlay?.addEventListener('click', closeSidebarMobile);

            collapseBtn?.addEventListener('click', () => {
                const current = localStorage.getItem(storageKey) === '1';
                const next = !current;
                localStorage.setItem(storageKey, next ? '1' : '0');
                collapseDesktop(next);
            });

            shell.querySelectorAll('[data-theme-toggle]').forEach((button) => {
                button.addEventListener('click', () => {
                    const nextTheme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                    applyTheme(nextTheme);
                });
            });

            window.addEventListener('resize', () => {
                if (window.matchMedia('(min-width: 1024px)').matches) {
                    closeSidebarMobile();
                    const collapsed = localStorage.getItem(storageKey) === '1';
                    collapseDesktop(collapsed);
                }
            });

            collapseDesktop(localStorage.getItem(storageKey) === '1');
        })();
    </script>
</body>
</html>

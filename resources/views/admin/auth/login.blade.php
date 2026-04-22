<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
                },
            },
        };
    </script>
    <style>
        :root {
            --login-bg-1: #f8f6ef;
            --login-bg-2: #eef7ff;
            --login-bg-3: #f0fdfa;
            --login-card: rgba(255, 255, 255, 0.9);
            --login-card-border: rgba(226, 232, 240, 0.85);
            --login-panel: rgba(255, 255, 255, 0.3);
            --login-panel-border: rgba(255, 255, 255, 0.5);
            --login-ink: #1e293b;
            --login-muted: #64748b;
            --login-input: rgba(255, 255, 255, 0.95);
        }

        html[data-theme='dark'] {
            --login-bg-1: #020617;
            --login-bg-2: #0f172a;
            --login-bg-3: #111827;
            --login-card: rgba(15, 23, 42, 0.85);
            --login-card-border: rgba(100, 116, 139, 0.45);
            --login-panel: rgba(15, 23, 42, 0.5);
            --login-panel-border: rgba(100, 116, 139, 0.35);
            --login-ink: #e2e8f0;
            --login-muted: #94a3b8;
            --login-input: rgba(15, 23, 42, 0.9);
        }

        body {
            color: var(--login-ink);
            background: linear-gradient(135deg, var(--login-bg-1), var(--login-bg-2), var(--login-bg-3));
        }

        .login-theme-toggle {
            border: 1px solid var(--login-card-border);
            background: var(--login-card);
            color: var(--login-ink);
            border-radius: 999px;
            padding: 0.45rem 0.8rem;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .login-theme-toggle svg {
            width: 1rem;
            height: 1rem;
        }
    </style>
</head>
<body class="min-h-screen font-sans">
    <div class="fixed top-4 right-4 z-20">
        <button type="button" class="login-theme-toggle" data-theme-toggle>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12.79A9 9 0 1111.21 3c0 0-1.71 6.29 3.79 11.79S21 12.79 21 12.79z" /></svg>
            <span data-theme-label>Light</span>
        </button>
    </div>

    <div class="min-h-screen grid lg:grid-cols-2">
        <div class="hidden lg:flex flex-col justify-between p-10 border-r backdrop-blur-xl" style="border-color: var(--login-panel-border); background: var(--login-panel);">
            <div class="text-sm font-semibold tracking-wide" style="color: var(--login-muted);">Eventora Admin Suite</div>
            <div>
                <h1 class="text-4xl font-bold leading-tight max-w-lg">Own the day-of operations with calm, clear control.</h1>
                <p class="mt-4 max-w-md" style="color: var(--login-muted);">Manage events, media, and team updates from one streamlined workspace built for production speed.</p>
            </div>
            <div class="text-xs" style="color: var(--login-muted);">Secure access only for authorized admin accounts.</div>
        </div>

        <div class="flex items-center justify-center p-4 sm:p-8">
            <div class="w-full max-w-md rounded-2xl border backdrop-blur p-6 sm:p-8 shadow-xl" style="border-color: var(--login-card-border); background: var(--login-card);">
                <div class="text-center mb-5">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-teal-500 text-white text-xl font-bold">E</div>
                    <div class="text-2xl font-bold mt-3">Welcome back</div>
                    <p class="text-sm" style="color: var(--login-muted);">Sign in to your admin workspace</p>
                </div>

                <form action="{{ route('admin.login.submit') }}" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-sm" style="color: var(--login-muted);">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-3 border rounded-xl focus:border-sky-500 focus:ring-2 focus:ring-sky-200 outline-none transition" style="background: var(--login-input); border-color: var(--login-card-border); color: var(--login-ink);">
                        @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="text-sm" style="color: var(--login-muted);">Password</label>
                        <input type="password" name="password" required class="mt-1 w-full px-4 py-3 border rounded-xl focus:border-sky-500 focus:ring-2 focus:ring-sky-200 outline-none transition" style="background: var(--login-input); border-color: var(--login-card-border); color: var(--login-ink);">
                    </div>
                    <button class="w-full bg-gradient-to-r from-sky-500 to-teal-500 hover:brightness-95 text-white py-3 rounded-xl font-semibold transition">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function () {
            const key = 'urban_admin_theme';
            const root = document.documentElement;
            const preferred = localStorage.getItem(key)
                || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            const applyTheme = (theme) => {
                root.setAttribute('data-theme', theme);
                localStorage.setItem(key, theme);
                document.querySelectorAll('[data-theme-label]').forEach((el) => {
                    el.textContent = theme === 'dark' ? 'Dark' : 'Light';
                });
            };

            applyTheme(preferred);

            document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
                button.addEventListener('click', () => {
                    const next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                    applyTheme(next);
                });
            });
        })();
    </script>
</body>
</html>

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
</head>
<body class="min-h-screen bg-gradient-to-br from-[#f8f6ef] via-[#eef7ff] to-[#f0fdfa] font-sans text-slate-800">
    <div class="min-h-screen grid lg:grid-cols-2">
        <div class="hidden lg:flex flex-col justify-between p-10 border-r border-white/50 bg-white/30 backdrop-blur-xl">
            <div class="text-sm font-semibold tracking-wide text-slate-500">Eventora Admin Suite</div>
            <div>
                <h1 class="text-4xl font-bold leading-tight max-w-lg">Own the day-of operations with calm, clear control.</h1>
                <p class="mt-4 text-slate-600 max-w-md">Manage events, media, and team updates from one streamlined workspace built for production speed.</p>
            </div>
            <div class="text-xs text-slate-500">Secure access only for authorized admin accounts.</div>
        </div>

        <div class="flex items-center justify-center p-4 sm:p-8">
            <div class="w-full max-w-md rounded-2xl border border-slate-200/80 bg-white/90 backdrop-blur p-6 sm:p-8 shadow-xl shadow-slate-300/30">
                <div class="text-center mb-5">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-teal-500 text-white text-xl font-bold">E</div>
                    <div class="text-2xl font-bold mt-3">Welcome back</div>
                    <p class="text-slate-500 text-sm">Sign in to your admin workspace</p>
                </div>

                <form action="{{ route('admin.login.submit') }}" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-sm text-slate-600">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-3 border border-slate-300/80 rounded-xl focus:border-sky-500 focus:ring-2 focus:ring-sky-200 outline-none transition">
                        @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="text-sm text-slate-600">Password</label>
                        <input type="password" name="password" required class="mt-1 w-full px-4 py-3 border border-slate-300/80 rounded-xl focus:border-sky-500 focus:ring-2 focus:ring-sky-200 outline-none transition">
                    </div>
                    <button class="w-full bg-gradient-to-r from-sky-500 to-teal-500 hover:brightness-95 text-white py-3 rounded-xl font-semibold transition">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

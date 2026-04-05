<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ config('app.name', 'Eventora') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="min-h-screen flex">
        <aside class="w-60 bg-white shadow-sm border-r">
            <div class="p-4 font-bold text-lg">Eventora Admin</div>
            <nav class="px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-slate-100' }}">Dashboard</a>
                <a href="{{ route('admin.events.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.events.*') ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-slate-100' }}">Events</a>
                <a href="{{ route('admin.gallery.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.gallery.*') ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-slate-100' }}">Gallery</a>
                <a href="{{ route('admin.team.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.team.*') ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-slate-100' }}">Team</a>
                <a href="{{ route('admin.messages.index') }}" class="block px-3 py-2 rounded {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-slate-100' }}">Messages</a>
                <form action="{{ route('admin.logout') }}" method="post" class="px-3 py-2">
                    @csrf
                    <button class="text-sm text-red-600">Logout</button>
                </form>
            </nav>
        </aside>
        <main class="flex-1">
            <header class="bg-white border-b px-6 py-3 flex items-center justify-between">
                <div class="font-semibold">@yield('title')</div>
                <div class="text-sm text-slate-500">Signed in as admin</div>
            </header>
            <div class="p-6">
                @if(session('status'))
                    <div class="mb-4 p-3 rounded bg-green-50 text-green-700 border border-green-100">{{ session('status') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

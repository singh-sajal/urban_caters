<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-100">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <div class="text-center mb-4">
            <div class="text-2xl font-bold">Eventora Admin</div>
            <p class="text-slate-500 text-sm">Secure dashboard access</p>
        </div>
        <form action="{{ route('admin.login.submit') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm text-slate-600">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-3 border rounded-lg focus:border-indigo-500">
                @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm text-slate-600">Password</label>
                <input type="password" name="password" required class="mt-1 w-full px-4 py-3 border rounded-lg focus:border-indigo-500">
            </div>
            <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold">Login</button>
        </form>
    </div>
</body>
</html>

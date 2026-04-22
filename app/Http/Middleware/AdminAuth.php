<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $adminId = $request->session()->get('admin_id');

        if (!$adminId) {
            return redirect()->route('admin.login');
        }

        $isValidAdmin = User::query()
            ->whereKey($adminId)
            ->where('is_admin', true)
            ->exists();

        if (!$isValidAdmin) {
            $request->session()->forget('admin_id');

            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }

        $userRole = Auth::user()->role;
        if ($userRole == 1) {
            return $next($request);
        } else if ($userRole == 2) {
            return redirect()->route("dashboard");
        }

        // Chỉ tiếp tục nếu vai trò người dùng không phải 1 hoặc 2 (tùy chọn)
        return $next($request);
    }
}

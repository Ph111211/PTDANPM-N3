<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra nếu user chưa đăng nhập hoặc không có vai trò phù hợp
        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}


<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     * 
     * Middleware kiểm tra xem user có phải admin không
     * Áp dụng bảo mật: chỉ admin mới truy cập được các route admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra user đã đăng nhập và có role admin
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Nếu không phải admin, redirect về trang chủ với thông báo lỗi
        return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này!');
    }
}

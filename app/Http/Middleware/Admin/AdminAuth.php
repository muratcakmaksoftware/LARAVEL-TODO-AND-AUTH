<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}

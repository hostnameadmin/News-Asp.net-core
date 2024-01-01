<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Reset_Password
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
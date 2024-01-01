<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Register_Confirm
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}

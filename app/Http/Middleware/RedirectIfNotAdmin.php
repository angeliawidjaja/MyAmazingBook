<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(!Auth::check() || Auth::user()->role_id != 2) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}

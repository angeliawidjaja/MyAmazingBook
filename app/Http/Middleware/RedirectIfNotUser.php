<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUser
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(!Auth::check() || Auth::user()->role_id != 1) {
            return redirect(RouteServiceProvider::INDEX);
        }
        return $next($request);
    }
}

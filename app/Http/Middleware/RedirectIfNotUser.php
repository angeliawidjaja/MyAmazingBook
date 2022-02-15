<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUser
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(!Auth::check() || Auth::user()->role_id != 1) {
            return abort(401);
        }
        return $next($request);
    }
}

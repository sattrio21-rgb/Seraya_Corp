<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        // Only check web guard, ignore admin guard
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        // Make sure we're using the web guard for the rest of the request
        Auth::shouldUse('web');

        return $next($request);
    }
}

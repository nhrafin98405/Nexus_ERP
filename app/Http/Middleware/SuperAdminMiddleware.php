<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * 
     */
    public function handle($request, Closure $next)
{
    if (!auth()->check()) {
        abort(403);
    }

    if (!auth()->user()->hasRole('Super Admin')) {
        abort(403);
    }

    return $next($request);
}
}

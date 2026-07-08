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
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        if(!auth()->user()->hasRole('super-admin')){
            abort(403,'Unauthrized');
        }

        return $next($request);
    }
}

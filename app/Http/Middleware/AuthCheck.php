<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check custom session login OR Breeze auth
        if (session('login') || auth()->check()) {
            return $next($request);
        }

        // Redirect to home if not authenticated
        return redirect('/')->with('error', 'Anda harus login terlebih dahulu');
    }
}

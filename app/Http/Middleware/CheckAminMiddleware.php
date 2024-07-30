<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->chuc_vu_id === 3) {
                return $next($request);
            } else {
                // Redirect to user dashboard or any other appropriate route
                return redirect('/index');
            }
        }
    
        // If the user is not authenticated
        return redirect('/login');
       
    }
}

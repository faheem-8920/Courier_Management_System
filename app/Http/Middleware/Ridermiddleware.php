<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiderMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }

        
        if (Auth::user()->role !== 'rider') {
            abort(403, 'Unauthorized'); 
        }

        return $next($request);
    }
}

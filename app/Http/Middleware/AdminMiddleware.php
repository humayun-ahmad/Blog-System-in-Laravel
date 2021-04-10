<?php

namespace App\Http\Middleware;

use Closure;

// newly used by me
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role->name == "Admin"){
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}

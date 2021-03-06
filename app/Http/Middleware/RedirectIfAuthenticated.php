<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role->name == "Admin") {
            return redirect()->route('admin.dashboard');
//            return 'admin/dashboard';
        } elseif(Auth::guard($guard)->check() && Auth::user()->role->name == "Author") {
            return redirect()->route('author.dashboard');
//            return 'author/dashboard';
        } else {
            return $next($request);
        }


    }
}

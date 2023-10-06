<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // jika user sudah login & roles nya adalah ADMIN maka request diteruskan
        if(Auth::user() && Auth::user()->roles == 'ADMIN') {
            return $next($request);
        }

        // jika tidak maka redirect ke halaman frontend
        return redirect('/');
    }
}

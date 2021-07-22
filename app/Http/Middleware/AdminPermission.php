<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check admin permission
        // if (Auth::user() &&  Auth::user()->admin == 1) {
        //     return $next($request);
        // }

        // return redirect('/');
        return $next($request);
    }
}

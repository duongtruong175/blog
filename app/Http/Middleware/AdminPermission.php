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
        // kiem tra quyen admin khi vao trang quan tri
        // if (Auth::user() &&  Auth::user()->admin == 1) {
        //     return $next($request);
        // }

        // return redirect('/');
        return $next($request);
    }
}

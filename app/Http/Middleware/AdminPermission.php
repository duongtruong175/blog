<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //check admin permission
        if (Auth::check()) {
            foreach(Auth::user()->roles as $role) {
                if($role->name === 'admin') {
                    return $next($request);
                }
            }
        }
        
        // if don't have permission
        abort(403);
    }
}

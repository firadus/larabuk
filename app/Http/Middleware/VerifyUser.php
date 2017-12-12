<?php

namespace App\Http\Middleware;

use Closure;
Use Auth;

class VerifyUser
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
        if (!Auth::user()->status) {
            return $next($request);
        } else {
            return redirect()->route('root');
        }
        return $red;
    }
}

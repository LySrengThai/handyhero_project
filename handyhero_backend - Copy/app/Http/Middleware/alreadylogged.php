<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class alreadylogged
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
        if(Session()->has('loginID') && (url('admin_login')==$request->url())){
            return back();
        }
        return $next($request);
        return $next($request);
    }
}

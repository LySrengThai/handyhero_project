<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\company_detail;

class CompanyUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // return response()->json(['message' => 'company route'], 200);
        // This check is for fetching data from api using api_token
        if ($request->header('Authorization')) {
         $remember_token = $request->header('Authorization');
 
         $adminData = company_detail::where('remember_token', $remember_token)->first();
 
         if ($adminData) {
             return $next($request);
         }
     }
 
     return response()->json(['message' => 'You are not authorized to access this admin route.'], 401);
    }
}

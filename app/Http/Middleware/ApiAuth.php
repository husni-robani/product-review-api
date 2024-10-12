<?php

namespace App\Http\Middleware;

use App\Http\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuth
{
    /**
     * This middleware to determine is the request has valid token or not
     *
     * @param Request $request
     * @param Closure $next
     * @return Closure|ApiResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('sanctum')->check()){
            return $next($request);
        }
        return new ApiResponse(401,  errorMessage: 'Unauthorized');
    }
}

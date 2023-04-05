<?php

namespace App\Http\Middleware;

use App\Http\Controllers\API\V1\ResponseFormatter;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class authJwt
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
        try {
            if(!auth()->user())
            {
                return ResponseFormatter::error(NULL,'Unauthenticated.');
            }
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'user not found'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        return $next($request);
    }
}

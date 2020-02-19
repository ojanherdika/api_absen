<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class Authenticate extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * 
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'message'=>'Invalid Token',
                    'status' => 'Failed'
                ]);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'message'=>'Token Expired',
                    'status' => 'Failed'
                    ]);
            }else{
                return response()->json([
                    'message'=>'Token Not Found',
                    'status' => 'Failed'
                    ]);
            }
        }
        return $next($request);
    }
}


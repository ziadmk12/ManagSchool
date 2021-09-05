<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
class CheckAdminToken
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
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidExeception)
            return response()->json(['success'=>false,'msg'=>'INVALID_TOKEN'],200);
        }
        if(!$user)
        return response()->json(['success'=>false,'msg'=>'Unauthenticated']);
        return $next($request);
    }
}

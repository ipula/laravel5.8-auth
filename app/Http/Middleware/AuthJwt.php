<?php

namespace App\Http\Middleware;

use App\Helpers\APIHelper;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            dd($user);

            if($user->is_verify==1){

            }else{
                $result = APIHelper::createAPIResponse(true, 10004, null, null);
                return response()->json($result, 401);
            }

        } catch (TokenExpiredException $e) {
            $result = APIHelper::createAPIResponse(true, 14004, null, null);
            return response()->json($result, 401);
        } catch (TokenInvalidException $e) {
            $result = APIHelper::createAPIResponse(true, 14004, null, null);
            return response()->json($result, 401);
        } catch (JWTException $e) {
            $result = APIHelper::createAPIResponse(true, 14004, null, null);
            return response()->json($result, 401);
        }

        $response =  $next($request);
        return $response;
    }
}

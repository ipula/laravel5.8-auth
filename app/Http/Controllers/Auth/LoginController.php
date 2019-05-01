<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\APIHelper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function login(Request $request){

        if (!isset($request->email) || !isset($request->password)) {
            $result = APIHelper::createAPIResponse(true, 50001,null, 'Email and Password field needed');
            return response()->json($result, 401);
        } else {
            $user = User::where('email', '=', $request->email)->first();
            if ($user) {
                if($user['user_is_verify']==1){
                    if(Hash::check($request->password, $user->password)){

                        $customClaims = ["email" => $request->email, "role" => $user->role,"is_verify" => $user->user_is_verify];
                        $payload = JWTFactory::sub($user->user_id)->data($customClaims)->make();
                        $token = JWTAuth::encode($payload);

                        $result=APIHelper::createAPIResponse(false,null,["access_token"=>(string)$token],null);
                        return response()->json($result, 201);
                    }else{
                        $result = APIHelper::createAPIResponse(true, 14001,null, 'Email or password incorrect');
                        return response()->json($result, 401);
                    }
                }else{
                    $result = APIHelper::createAPIResponse(true, 10004,null, 'User not verify');
                    return response()->json($result, 401);
                }
            } else {
                $result = APIHelper::createAPIResponse(true, 14001, null,'Email or password incorrect');
                return response()->json(["result" => $result], 401);
            }

        }

    }
}

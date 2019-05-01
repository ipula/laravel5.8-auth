<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelper;
use App\Http\Requests\Api\UserRequest;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function createUser(UserRequest $request){

        try{
            $user=new User();
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            $user->date_of_birth=$request->date_of_birth;
            $user->mobile=$request->mobile;
            $user->password=bcrypt($request->password);
            $user->verification_code=Str::random(60);

            if($user->save()){
                $result = APIHelper::createAPIResponse(false, null, null, "User registration success");
                return response()->json($result,201);
            }else{
                $result = APIHelper::createAPIResponse(true, null, null, "User registration failed");
                return response()->json($result,500);
            }

        }catch (\Exception $exception){
            $result = APIHelper::createAPIResponse(true, null, null, $exception->getMessage());
            return response()->json($result,500);
        }

    }

    public function getUser(){
        $user=User::paginate(10);
        $result = APIHelper::createAPIResponse(false, null, $user, "User registration success");
        return response()->json($result,200);
    }
}

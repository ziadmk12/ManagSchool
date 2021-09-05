<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;


class UserController extends Controller
{
    //
    public function Userlogin(Request $request)
    { 
            $rules = [
                "email" => "required|exists:users",
                "password" => "required"
            ];
            
            $validator = Validator::make($request->all(),$rules);
    
            if($validator->fails()) {
                return response()->json(['success'=>false,'msg'=>'INVALID EMAIL']);
            }
            
            //Login
    
            $credentials = $request->only(['email', 'password']);
    
           $token = Auth::guard('user-api')->attempt($credentials);
            $user = Auth::guard('user-api')->user();
            $user->api_token=$token;

    
          if(!$token) 
                return response()->json(['success'=>false,'msg'=>'INVALID TOKEN']);
               // Return Token
               return response()->json(['TOKEN'=>$user]);  
    }
}

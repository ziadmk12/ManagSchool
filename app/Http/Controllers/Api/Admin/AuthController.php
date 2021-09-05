<?php

namespace App\Http\Controllers\Api\Admin;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
//use Auth;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AuthController extends Controller
{
    public function Login(Request $request)
    { 
            $rules = [
                "email" => "required|exists:admins",
                "password" => "required"
            ];
            
            $validator = Validator::make($request->all(),$rules);
    
            if($validator->fails()) {
                return response()->json(['success'=>false,'msg'=>'INVALID EMAIL']);
            }
            
            //Login
    
            $credentials = $request->only(['email', 'password']);
    
           $token = Auth::guard('admin-api')->attempt($credentials);
            $admin = Auth::guard('admin-api')->user();
            $admin->api_token=$token;

    
          if(!$token) 
                return response()->json(['success'=>false,'msg'=>'INVALID TOKEN']);
               // Return Token
               return response()->json(['status'=>'success','data'=>$admin]);  
    }

    

    public function logout(Request $request)
    {
        $token = $request->header('auth-token');

        if($token)
        {
            try {
                //code...
                JWTAuth::setToken($token)->invalidate(); //logout
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['success'=>false,'msg'=>'somthing wrong']); 
            }   
            return response()->json(['success'=>true,'msg'=>'logout success']);
        }
        else {
            return response()->json(['success'=>false,'msg'=>'INVALID TOKEN']);
        }

        return $token;
    }

   
}

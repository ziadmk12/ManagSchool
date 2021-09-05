<?php

namespace App\Http\Controllers\Api\Admin;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Teacher;
use App\Matter;



class TeachersController extends Controller
{
    public function addTeacher(Request $request)
    {
        $token = $request->header('auth-token');
        

        if(!$token)
        {
            return response()->json(['success'=>false,'msg'=>'INVALID TOKEN']);   
        }
        else
        { 
            $teacher = new Teacher();

            $teacher->name=$request->input('name');
            $teacher->matter=$request->input('matter');
            $teacher->age=$request->input('age');
            $teacher->phone=$request->input('phone');
            $teacher->adress=$request->input('adress');
            $teacher->email=$request->input('email');
            $teacher->password=Hash::make($request->input('password'));

            $teacher->save();
            return response()->json(['success'=>'true','data'=>$teacher]);

        }   
    }

    public function showTeacher(Request $request) 
    {
        $token = $request->header('auth-token');
        if(!$token)
        {
            return response()->json(['success'=>false,'msg'=>'INVALID TOKEN']);   
        }
        else {
            $teacher = Teacher::all();
            $matters = Matter::all();
            return response()->json($teacher);

           
        }

    }
}

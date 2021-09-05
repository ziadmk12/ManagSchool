<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Routes


Route::group([ 'namespace'=>'Api'],function(){
   
    Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::post('/login', 'AuthController@login');    
    });
    Route::group(['prefix'=>'admin','middleware'=>'assignGuard:admin-api','namespace'=>'Admin'],function(){
        Route::post('/logout', 'AuthController@logout');
        Route::post('/add-teacher', 'TeachersController@addTeacher');
        Route::post('/show-teacher', 'TeachersController@showTeacher');

    });


    Route::group(['prefix'=>'user','namespace'=>'User'],function(){
        Route::post('/login', 'UserController@Userlogin');     
    });

    
    Route::group(['prefix'=>'user','middleware'=>'assignGuard:user-api'],function(){
        Route::post('/profile',function(){
            return 'only for users';
        });
       
    });

    Route::group(['prefix'=>'admin','middleware'=>'assignGuard:admin-api','namespace'=>'Admin'],function(){
        Route::post('/test',function(){
            return 'only for test';
        });
    });

});
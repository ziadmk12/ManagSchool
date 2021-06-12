<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::get('/teacher', 'TeachersController@index')->name('teacher');
Route::post('/teacher-add', 'TeachersController@store')->name('addTeacher');
Route::get('/teacher/{id}', 'TeachersController@getTeacherByID')->name('getTeacher');
Route::post('/teacher','TeachersController@updateTeacher')->name('updateTeacher');
Route::delete('/teachers/{id}', 'TeachersController@deleteTeacher')->name('deleteTeacher');

/////////////

Route::get('/matter', 'MattersController@index')->name('matter');
Route::get('/matter-ipi', 'MattersController@index2')->name('matter2');

Route::post('/matter-add', 'MattersController@store')->name('addMatter');
Route::get('/matter/{id}', 'MattersController@getMatterByID')->name('getMatter');
Route::post('/matter','MattersController@update')->name('updateMatter');
Route::delete('/matter/{id}', 'MattersController@destroy')->name('deleteMatter');

/////////////

Route::get('/classes', 'ClasseController@index')->name('class');
Route::post('/class-add', 'ClasseController@store')->name('addClass');
Route::get('/class/{id}', 'ClasseController@getClassByID')->name('getClass');
Route::post('/class','ClasseController@update')->name('updateClass');
Route::delete('/class/{id}', 'ClasseController@destroy')->name('deleteClass');

/////////////
Route::get('/student', 'StudentsController@index')->name('student');
Route::post('/student-add', 'StudentsController@store')->name('addStudent');
Route::get('/student/{id}', 'StudentsController@getStudentByID')->name('getStudent');
Route::post('/student','StudentsController@update')->name('updateStudent');
Route::delete('/student/{id}', 'StudentsController@destroy')->name('deleteStudent');


//Route::get('/class-pdf', 'ClasseController@createPDF')->name('class-pdf');





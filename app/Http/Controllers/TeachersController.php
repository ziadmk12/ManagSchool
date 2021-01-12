<?php

namespace App\Http\Controllers;

use App\Matter;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Util\Json;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        
        return view('teacher.teacher',[
            'teachers'=>Teacher::all(),
            'matters'=>Matter::all()
        ]);
    }

    public function getTeacherByID($id)
    {
        
        $Teacher = Teacher::findOrFail($id);


        return response()->json($Teacher);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $teacher = new Teacher();

        $teacher->name=$request->input('name');
        $teacher->matter=$request->input('matter');
        $teacher->age=$request->input('age');
        $teacher->phone=$request->input('phone');
        $teacher->adress=$request->input('adress');
        $teacher->email=$request->input('email');
        $teacher->password=Hash::make($request->input('password'));

       

       
        // $uploadFile = $request->file('file');
        // //generate random filename
        // $filename = str::random(6).'.'.$uploadFile->extension();
        // // storing path (Change it to your desired path in public folder)
        // $path = 'img/uploads';
        // // Move file to public filder
        // $uploadFile->storeAs('../../public/'.$path, $filename);
        // $teacher->picture = $path.'/'.$filename; 
    

        if($request->hasFile('picture')){
            $teacher->picture = $request->picture->store('image');
        }

        $teacher->save();
        return response()->json($teacher);

    }

    public function updateTeacher(Request $request)
    {

        $teacher = Teacher::find($request->input('id'));

        $teacher->name = $request->name;
        $teacher->matter=$request->matter;
        $teacher->age = $request->age;
        $teacher->phone = $request->phone;
        $teacher->adress = $request->adress;
        $teacher->email = $request->email;
        $teacher->password  = Hash::make($request->password);
        if($request->hasFile('picture')){
            $teacher->picture = $request->picture->store('image');
        }
        $teacher->save();
        return response()->json($teacher);
        // return response()->json($name);
    }



    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return response()->json(['success'=>'teacher has been deleted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}

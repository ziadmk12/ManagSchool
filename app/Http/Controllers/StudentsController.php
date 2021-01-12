<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;




class StudentsController extends Controller
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
        return view('Student.student',[
            'students'=>Student::all(),
            'classes'=>Classe::all()
        ]);        
    }

    

    public function getStudentByID($id)
    {
        
        $student = Student::findOrFail($id);


        return response()->json($student);
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
        $student = new Student();

        $student->name=$request->input('name');
        $student->age=$request->input('age');
        $student->phone=$request->input('phone');
        $student->adress=$request->input('adress');
        $student->class=$request->input('class');
        $student->email=$request->input('email');
        $student->password=Hash::make($request->input('password'));

        if($request->hasFile('picture')){
            $student->picture = $request->picture->store('image');
        }

        $student->save();
        return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $student = Student::find($request->input('id'));

        $student->name=$request->name;
        $student->age=$request->age;
        $student->phone=$request->phone;
        $student->adress=$request->adress;
        $student->class=$request->class;
        $student->email=$request->email;
        $student->password=Hash::make($request->password);

        if($request->hasFile('picture')){
            $student->picture = $request->picture->store('image');
        }

        $student->save();
        return response()->json($student);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::find($id);
        $student->delete();

        return response()->json(['success'=>'teacher has been deleted']);
    }
}

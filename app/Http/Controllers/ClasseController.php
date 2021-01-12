<?php

namespace App\Http\Controllers;

use App\Classe;
use Illuminate\Http\Request;
use PDF;
class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classe.classes', ['Classes'=> Classe::all()]);
    }



    public function getClassByID($id)
    {
        $class = Classe::findOrFail($id);
        return response()->json($class);
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
        $class = new Classe();

        $class->className=$request->input('nameclass');
        $class->numberStudents=$request->input('numberSt');

        $class->save();
        return response()->json($class);
    }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $class = Classe::find($request->input('id'));
    
        $class->className=$request->input('nameclass');
        $class->numberStudents=$request->input('numberSt');

        $class->save();
        return response()->json($class);
    }

    public function createPDF() {
        // retreive all records from db
        $Classes = Classe::all();
  
        // share data to view
        
        $pdf = PDF::loadView('classe.classes',compact('Classes'));
  
        // download PDF file with download method
        set_time_limit(300);
        return $pdf->download('classes.pdf');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $class = Classe::find($id);
        $class->delete();

        return response()->json(['success'=>'teacher has been deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Matter;
use Illuminate\Http\Request;

class MattersController extends Controller
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
        return view('matter.matter',['Matters' => Matter::all(),
        
        ]);
    }

    public function index2()
    {
        //
        return Matter::all();
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
        $matter = new Matter();

        $matter->matterName=$request->input('nameMatter');

        $matter->save();
        return response()->json($matter);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function show(Matter $matter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function edit(Matter $matter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
         // $name=$request->input('name');
            
            $matter = Matter::find($request->input('id'));
    
            $matter->matterName = $request->name;


            $matter->save();
            return response()->json($matter);
            // return response()->json($name);
        
    }

    
    public function getMatterByID($id)
    {
        $matter = Matter::findOrFail($id);
        return response()->json($matter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matter  $matter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matter = Matter::find($id);
        $matter->delete();

        return response()->json(['success'=>'teacher has been deleted']);
        //
    }
}

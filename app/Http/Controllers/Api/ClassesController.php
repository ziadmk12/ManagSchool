<?php

namespace App\Http\Controllers\Api;
use App\Classe;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    
    public function index() 
    {

        $classes = Classe::get();
        return response()->json($classes);
    }
    
}

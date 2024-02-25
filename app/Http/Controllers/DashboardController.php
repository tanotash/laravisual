<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $dato = "Hola Mundo";

    return view('dash.index')->with(['dato' => $dato]);
    
        
    }
}

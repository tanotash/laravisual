<?php

namespace App\Http\Controllers;
use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $Empleados = Empleado::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

    return view('dash.index', compact('Empleados'));
    
        
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril'],
            'datasets' => [
                [
                    'label' => 'Ventas por mes',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [150, 200, 250, 300]
                ]
            ]
        ];

        return view('dash.index', compact('data'));
    }
}

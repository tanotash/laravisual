<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ChartJSController extends Controller
{
    public function index()
    {
        $performanceData = [
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'datasets' => [
                [
                    'label' => 'Performance',
                    'backgroundColor' => 'rgba(125, 95, 255, 0.3)',
                    'borderColor' => 'rgb(125, 95, 255)',
                    'data' => [90, 100, 80, 95, 110, 85, 88, 92, 110, 105, 99, 95]
                ]
            ]
        ];

        // Simular datos para el gráfico de envíos totales (Total Shipments)
        $shipmentsData = [
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            'datasets' => [
                [
                    'label' => 'Total Shipments',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => [1500, 2000, 2500, 1800, 2200, 2600]
                ]
            ]
        ];

        // Simular datos para el gráfico de ventas diarias (Daily Sales)
        $salesData = [
            'labels' => ['USA', 'GER', 'AUS', 'UK', 'RO', 'BR'],
            'datasets' => [
                [
                    'label' => 'Daily Sales',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => [300, 600, 150, 200, 500, 300]
                ]
            ]
        ];

        // Simular datos para el gráfico de tareas completadas (Completed Tasks)
        $tasksData = [
            'labels' => ['Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'datasets' => [
                [
                    'label' => 'Completed Tasks',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [20, 50, 80, 20, 60, 70]
                ]
            ]
        ];
    
        return view('dash.index', compact('performanceData', 'shipmentsData', 'salesData', 'tasksData'));
    
    }
}

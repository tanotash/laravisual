@extends('adminlte::page')


@section('title', 'Dashboard')
<title>Laravel ChartJS Chart Example</title>



@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>    
    <div class="dashboard">
    <!-- Título y Gráfico de Rendimiento -->
    <div class="chart-container">
        <h2 class="chart-title">Total Performance</h2>
        <canvas id="performanceChart" class="my-chart"></canvas>
    </div>

    <!-- Métricas Clave: Total Shipments -->
    <div class="big-number">
        <span class="label">Total Shipments</span>
        <canvas id="shipmentsChart" class="my-chart"></canvas>
    </div>

    <!-- Métricas Clave: Daily Sales -->
    <div class="big-number">
        <span class="label">Daily Sales</span>
        <canvas id="salesChart" class="my-chart"></canvas>
    </div>

    <!-- Métricas Clave: Completed Tasks -->
    <div class="big-number">
        <span class="label">Completed Tasks</span>
        <canvas id="tasksChart" class="my-chart"></canvas>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    
  
    
@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Datos para el gráfico de rendimiento
    const performanceData = @json($performanceData);
    const performanceChart = new Chart(document.getElementById('performanceChart'), {
        type: 'line',
        data: performanceData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Datos para el gráfico de envíos totales
    const shipmentsData = @json($shipmentsData);
    const shipmentsChart = new Chart(document.getElementById('shipmentsChart'), {
        type: 'line',
        data: shipmentsData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Datos para el gráfico de ventas diarias
    const salesData = @json($salesData);
    const salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'bar',
        data: salesData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Datos para el gráfico de tareas completadas
    const tasksData = @json($tasksData);
    const tasksChart = new Chart(document.getElementById('tasksChart'), {
        type: 'line',
        data: tasksData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stop
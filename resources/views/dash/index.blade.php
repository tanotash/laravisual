@extends('adminlte::page')


@section('title', 'Dashboard')



@section('content')
<head>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />



</head>    
<div class="row">
    <div class="col-12">

        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Total Shipments</h5>
                        <h2 class="card-title">Performance</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="performanceChart" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
<!-- Métricas Clave: Total Shipments -->
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Shipments</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="shipmentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>


<!-- Métricas Clave: Daily Sales -->
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Daily Sales</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>


<!-- Métricas Clave: Completed Tasks -->
    <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Completed Tasks</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="tasksChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@stop

@section('css')
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
            maintainAspectRatio: false,
            
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
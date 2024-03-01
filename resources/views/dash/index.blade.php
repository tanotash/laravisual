@extends('adminlte::page')


@section('title', 'Dashboard')
<title>Laravel ChartJS Chart Example</title>



@section('content')

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
    <style>
        .dashboard {
    background-color: #2c2c54; /* Fondo oscuro */
    color: white; /* Texto en blanco para contrastar con el fondo oscuro */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente general */
}

/* Estilo para los títulos de cada gráfico */
.dashboard .chart-title {
    color: #fff;
    padding: 10px 0;
    font-size: 20px;
    text-align: center;
    margin-bottom: 10px;
}

/* Estilo para los contenedores de gráficos para asegurar el espaciado adecuado */
.dashboard .chart-container {
    padding: 15px;
    margin-bottom: 30px; /* Espaciado entre los gráficos */
    border-radius: 8px; /* Bordes redondeados para los contenedores de gráficos */
    background: rgba(255, 255, 255, 0.1); /* Un toque de transparencia para los contenedores */
}

/* Estilo específico para los elementos canvas */
.dashboard canvas {
    background-color: #2c2c54; /* Fondo oscuro para el gráfico */
}

/* Estilo para los números grandes (KPIs o métricas clave) */
.dashboard .big-number {
    font-size: 48px; /* Tamaño grande de fuente */
    font-weight: bold;
    margin: 20px 0;
}

/* Colores para los gráficos, necesitarás agregar estas clases a tus datasets en Chart.js */
.chart-purple {
    border-color: #7d5fff; /* Color del borde para la línea del gráfico */
    background-color: rgba(125, 95, 255, 0.5); /* Color de fondo para la línea del gráfico */
}

.chart-blue {
    border-color: #4bc0c0; /* Color del borde para la línea del gráfico */
    background-color: rgba(75, 192, 192, 0.5); /* Color de fondo para la línea del gráfico */
}

.chart-green {
    border-color: #78e08f; /* Color del borde para la línea del gráfico */
    background-color: rgba(120, 224, 143, 0.5); /* Color de fondo para la línea del gráfico */
}

/* Estilo para las etiquetas de los gráficos, por ejemplo, 'Total Shipments', 'Daily Sales', 'Completed Tasks' */
.dashboard .label {
    display: block;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 5px;
}
.chart-container {
    max-height: 400px; /* o cualquier otra altura que se ajuste a tus necesidades */
    position: relative; /* esto es necesario para el correcto funcionamiento del gráfico responsivo */
}

.my-chart {
    height: 100% !important; /* esto asegura que el canvas tome el 100% de la altura del contenedor */
    width: 100% !important;  /* esto asegura que el canvas tome el 100% de la anchura del contenedor */
}
    </style>
    
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
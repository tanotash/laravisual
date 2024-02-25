@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1>Bienvenido al panel de administracion.</h1>
    <div>
    <a href='/empleados' class='btn btn-info mt-4' > Panel Empleados</a>
    </div> 
        @stop

@section('content')
    <p>Proximamente un dashboard</p>
    <div class="container-fluid">

        <section class="content-header">
            <h1>Dashboard</h1>
        </section>
    
        <div class="row">
            <div class="col-md-12">
                <x-dashboard>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExamplePieChart::class}}" position="a1:a2" height="140%"/>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleDoughnutChart::class}}" position="b1:b2" height="140%"/>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExamplePieChart::class}}" position="c1:c2" height="140%" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleDoughnutChart::class}}" position="d1:d2" height="140%" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="a3:b4" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="c3:d4" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="a5:b6" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="c5:d6" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="a7:b8" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="c7:d8" />
                </x-dashboard>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
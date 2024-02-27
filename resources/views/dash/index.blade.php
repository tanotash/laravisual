@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExamplePieChart::class}}" position="a1:a2" height="100%" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleDoughnutChart::class}}" position="b1:b2" height="100%" />
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="c1:c2" />
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="c3:d4" />
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

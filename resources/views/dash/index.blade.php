@extends('adminlte::page')


@section('title', 'Dashboard')



@section('content')
    <p>Proximamente un dashboard</p>

                <x-dashboard>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExamplePieChart::class}}" position="a1:a2" height="140%"/>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleDoughnutChart::class}}" position="b1:b2" height="140%"/>
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExamplePieChart::class}}" position="c1:c2" height="140%" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleDoughnutChart::class}}" position="d1:d2" height="140%" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="a3:b4" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="c3:d4" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleLineChart::class}}" position="a5:b6" />
                    <livewire:chart-tile chartFactory="{{\Fidum\ChartTile\Examples\ExampleBarChart::class}}" position="c5:d6" />
                </x-dashboard>
            
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
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
    <p>{{$hola='hola'}}</p>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stop
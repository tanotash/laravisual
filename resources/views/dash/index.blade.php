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
    
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> swal("Oops!", "Something went wrong on the page!", "error"); </script>

@stop
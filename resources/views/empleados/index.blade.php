@extends('adminlte::page')

@section('css')
<link href='https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css' rel='stylesheet'>
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>todos los empleados</h1>
@stop

@section('content')
   <a href="empleados/create" class="btn btn-primary mb-3">Agregar Empleado</a>
   <table id='empleados' class='table table-dark table-strippet mt-4' style="width:100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>ID rol</th>
            <th>ID obra</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr> 
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellido}}</td>
            <td>{{$empleado->idrol}}</td>
            <td>{{$empleado->idobra}}</td>
            <td>
                <form action='{{route('empleados.destroy', $empleado->id)}}' method='POST'>
                    <a href='empleados/{{$empleado->id}}/edit' class='btn btn-info'>Editar</a>
                        @csrf
                        @method('DELETE')
                    
                    <button type='submit'class='btn btn-danger'>Eliminar</button>
                </form>
            
        @endforeach
    
   @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src='https://code.jquery.com/jquery-3.7.1.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js'> </script>
    <script src='https://cdn.datatables.net/2.0.0/js/dataTables.js'> </script>
    <script src='https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js'></script>
    <script>new DataTable('#empleados');</script>

@stop
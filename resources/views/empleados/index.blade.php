@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>todos los empleados</h1>
@stop

@section('content')
   <a href="empleados/create" class="btn btn-primary mb-3">Agregar Empleado</a>
   <table class='table table-dark table-strippet mt-4'>
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
    <script> console.log('Hi!'); </script>
@stop
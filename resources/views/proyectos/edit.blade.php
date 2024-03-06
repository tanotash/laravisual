@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <h1>Editar Proyecto {{$proyecto->id}}</h1>

    <form action="/proyecto/{{$proyecto->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value='{{$proyecto->nombre}}'>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="apellido" value='{{$proyecto->descripcion}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de obra</label>
            <input type="text" class="form-control" name="rol" value='{{$proyecto->tipo_proyecto}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion</label>
            <input type="text" class="form-control" name="obra" value='{{$proyecto->ubicacion}}'>
        </div>

        
        <div class="mb-4">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href='/proyectos' class="btn btn-danger" type="reset">Cancelar</a>
    </div>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
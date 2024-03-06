@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <h1>Editar Proyecto {{$proyecto->id}}</h1>

    <form action="/proyectos/{{$proyecto->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value='{{$proyecto->nombre}}'>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" value='{{$proyecto->descripcion}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de obra</label>
            <input type="text" class="form-control" name="tipoProyecto" value='{{$proyecto->tipoProyecto}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion</label>
            <input type="text" class="form-control" name="ubicacion" value='{{$proyecto->ubicacion}}'>
        </div>

        
        <div class="mb-4">
        <button class="btn btn-primary" type="submit">Actualizar</button>
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
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

   <h1>Agregar nuevo Proyecto</h1>
   <form action="/proyectos" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="nombre del proyecto">
    </div>

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="apellido" placeholder="Descripcion de la obra">
    </div>
    <div class="mb-3">
        <label class="form-label">Tio de Proyecto</label>
        <input type="text" class="form-control" name="rol" placeholder="Tipo de obra">
    </div>
    <div class="mb-3">
        <label class="form-label">Ubicacion</label>
        <input type="text" class="form-control" name="obra" placeholder="Ubicacion de la obra">
    </div>
   
    <div class="mb-4">
    <button class="btn btn-primary" id='agregar' type="submit">Agregar</button>
    
    <a href='/empleados' class="btn btn-danger" type="reset">Cancelar</a>
    @if(session('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@endif
  
    </div>
</div>
</form>


    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
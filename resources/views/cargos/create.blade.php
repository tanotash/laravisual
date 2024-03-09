@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

   <h1>Agregar nuevo cargo</h1>
   <form action="/cargos" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="nombre del cargo">
    </div>

    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion del cargo">
    </div>
    <div class="mb-3">
        <label class="form-label">departamento</label>
        <input type="text" class="form-control" name="departamento" placeholder="Departamento">
    </div>
    <div class="mb-3">
        <label class="form-label">salario</label>
        <input type="number" class="form-control" name="salario" placeholder="salario">
    </div>
    <div>
        <input type="hidden" class="form-control" name="estado" value="1">
    </div>
   
</div>


<div class="mb-3">
    <div class="mb-4">
    <button class="btn btn-primary" id='agregar' type="submit">Agregar</button>
    
    <a href='/cargos' class="btn btn-danger" type="reset">Cancelar</a>
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
    <script> console.log('Hi!');
    </script>
@stop
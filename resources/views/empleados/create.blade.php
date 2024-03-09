@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

   <h1>Agregar nuevo Empleado</h1>
   <form action="/empleados" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="nombre del empleado">
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" placeholder="apellido del empleado">
    </div>
    <div class="mb-3">
        <label class="form-label">Rol</label>
<div class="mb-3">
        <select class="form-select form-select-lg mb-6" aria-label=".form-select-lg" name="rol" placeholder="rol del empleado">
            <option selected>Selecciona el cargo</option>
            @foreach ($cargos as $cargo)
            <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
            @endforeach
        </select>
    </div>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Obra</label>
        <div class="mb-3">
        <select class="form-select form-select-lg mb-6" aria-label=".form-select-lg" name="obra" placeholder="obra en que se encuentra el empleado">
            <option selected>Selecciona la obra</option>
            @foreach ($proyectos as $proyecto)
            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Número de Identificacion</label>
        <input type="text" class="form-control" name="dni" placeholder="Identificacion del empleado">
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
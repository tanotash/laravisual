@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <h1>Editar Empleado {{$empleado->id}}</h1>

    <form action="/empleados/{{$empleado->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value='{{$empleado->nombre}}'>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value='{{$empleado->apellido}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
        <div class="mb-3">
            <select class="form-select form-select-lg mb-6" aria-label=".form-select-lg" name="rol" value='{{$empleado->idcargo}}'>
                <option selected>Selecciona el cargo</option>
                @foreach ($cargos as $cargo)
                <option value="{{$cargo->id}}" {{$empleado->idrol == $cargo->id ? 'selected' : ''}}>{{$cargo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Obra</label>
            <div class="mb-3">
            <select class="form-select form-select-lg mb-6" aria-label=".form-select-lg" name="obra" value='{{$empleado->idobra}}'>
                <option selected>Selecciona la obra</option>
                @foreach ($proyectos as $proyecto)
                <option value="{{$proyecto->id}}" {{$empleado->idobra == $proyecto->id ? 'selected' : ''}}>{{$proyecto->nombre}}</option>
                @endforeach
            </select>
            </div>

        </div>
       
        <div class="mb-3">
            <label class="form-label">Número de Identificacion</label>
            <input type="text" class="form-control" name="dni" value='{{$empleado->DNI}}'>
        </div>
        
        <div class="mb-4">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href='/empleados' class="btn btn-danger" type="reset">Cancelar</a>
    </div>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
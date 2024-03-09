@extends('adminlte::page')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel='stylelsheet' href='/css/admin_custom.css'>


@stop


@section('title', 'Dashboard')

@section('content_header')


    <h1>Cargos</h1>
@stop

@section('content')
@if(session('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@endif
<a href="{{ url('cargos/create') }}" class="btn btn-primary mb-3">Agregar Cargo</a>
<table id="cargos" class="table table-dark table-striped mt-4" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th> <!-- Agregar encabezado para la columna de Nombre -->
            <th>Descripcion</th> <!-- Agregar encabezado para la columna de Apellido -->
            <th>Departamento</th> <!-- Agregar encabezado para la columna de Rol -->
            <th>salario</th> <!-- Agregar encabezado para la columna de Fecha de inicio -->
            <th>estado</th> <!-- Agregar encabezado para la columna de Fecha de fin -->
            <th>Acciones</th> <!-- Agregar encabezado para la columna de Acciones -->
        </tr>
    </thead>
    <tbody>
        @foreach ($cargos as $cargo)
        <tr>
            <td>{{ $cargo->id }}</td>
            <td>{{ $cargo->nombre }}</td>
            <td>{{ $cargo->descripcion }}</td>
            <td>{{ $cargo->departamento }}</td>
            <td>{{ $cargo->salario }}</td>
            <td>{{ $cargo->estado ==1 ? 'Activo' : 'Inactivo'}}</td>
            <td>
                <a href="{{ url('cargos/' . $cargo->id . '/edit') }}" class="btn btn-info">Editar</a>
                <form action="{{ route('cargos.destroy', $cargo->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esto?');">Eliminar</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>new DataTable('#cargos');</script>

@stop

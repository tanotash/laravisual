@extends('adminlte::page')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel='stylelsheet' href='/css/admin_custom.css'>


@stop


@section('title', 'Dashboard')

@section('content_header')


    <h1>Proyectos</h1>
@stop

@section('content')
@if(session('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@endif
<a href="{{ url('proyectos/create') }}" class="btn btn-primary mb-3">Agregar Proyecto</a>
<table id="proyectos" class="table table-dark table-striped mt-4" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th> <!-- Agregar encabezado para la columna de Nombre -->
            <th>Descripcion</th> <!-- Agregar encabezado para la columna de Apellido -->
            <th>Tipo de obra</th> <!-- Agregar encabezado para la columna de Rol -->
            <th>ubicacion</th> <!-- Agregar encabezado para la columna de Obra -->
            <th>Acciones</th> <!-- Agregar encabezado para la columna de Acciones -->
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id }}</td>
            <td>{{ $proyecto->nombre }}</td>
            <td>{{ $proyecto->descripcion }}</td>
            <td>{{ $proyecto->tipoProyecto }}</td>
            <td>{{ $proyecto->ubicacion }}</td>
            <td>
                <a href="{{ url('proyectos/' . $proyecto->id . '/edit') }}" class="btn btn-info">Editar</a>
                <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display: inline-block;">
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
    <script>new DataTable('#proyectos');</script>

@stop

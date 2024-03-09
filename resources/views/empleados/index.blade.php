@extends('adminlte::page')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel='stylelsheet' href='/css/admin_custom.css'>


@stop


@section('title', 'Dashboard')

@section('content_header')


    <h1>Empleados</h1>
@stop

@section('content')
@if(session('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@endif
<a href="{{ url('empleados/create') }}" class="btn btn-primary mb-3">Agregar Empleado</a>
<table id="empleados" class="table table-dark table-striped mt-4" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th> <!-- Agregar encabezado para la columna de Nombre -->
            <th>Apellido</th> <!-- Agregar encabezado para la columna de Apellido -->
            <th>Cargo</th> <!-- Agregar encabezado para la columna de Rol -->
            <th>Obra</th> <!-- Agregar encabezado para la columna de Obra -->
            <th>Código QR</th> <!-- Agregar encabezado para la columna de QR -->
            <th>Acciones</th> <!-- Agregar encabezado para la columna de Acciones -->
           
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->cargo->nombre ?? 'sin cargo' }}</td>
            <td>{{ $empleado->proyecto->nombre ?? 'sin obra'}}</td>
            <td>
                @if($empleado->qr_path)
                    <!-- Enlace para descargar el código QR -->

                
                    <a href="{{ asset($empleado->qr_path) }}" download="QR_{{ $empleado->nombre }}_{{ $empleado->apellido }}.png">
                        <img src="{{ asset($empleado->qr_path) }}" alt="QR Code" style="width: 100px;">
                        
                        
                    </a>
                @else
                    No disponible
                @endif
            <td>
                <a href="{{ url('empleados/' . $empleado->id . '/edit') }}" class="btn btn-info">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esto?');">Eliminar</button>
                </form>
            </td>
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
    <script>new DataTable('#empleado');</script>

@stop

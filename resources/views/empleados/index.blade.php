@extends('adminlte::page')

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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>ID rol</th>
            <th>ID obra</th>
            <th>Acciones</th>
            <th>Código QR</th> <!-- Agregar encabezado para la columna de QR -->
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->idrol }}</td>
            <td>{{ $empleado->idobra }}</td>
            <td>
                <a href="{{ url('empleados/' . $empleado->id . '/edit') }}" class="btn btn-info">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esto?');">Eliminar</button>
                </form>
            </td>
            <td>
                <!-- Mostrar el código QR si existe -->
                @if($empleado->qr_path)
                    <img src="{{ asset($empleado->qr_path) }}" alt="QR Code" style="width: 100px;">
                @else
                    No disponible
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script>$(document).ready(function() { $('#empleados').DataTable(); });</script>
@stop

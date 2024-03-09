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
        <div id="mapid" style="height: 400px;" >
            <label class="form-label">Ubicacion</label>
        
        
            <input type="hidden" id="latitud" name="latitud" value='{{$proyecto->latitud}}'>
            <input type="hidden" id="longitud" name="longitud" value='{{$proyecto->longitud}}'>
        </div>


{{--         <div class="mb-3">
            <label class="form-label">Ubicacion</label>
            <input type="text" class="form-control" name="ubicacion" value='{{$proyecto->ubicacion}}'>
        </div>
 --}}
        
        <div class="mb-4">
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href='/proyectos' class="btn btn-danger" type="reset">Cancelar</a>
    </div>
    </form>
    
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />@stop

@section('js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('mapid').setView([{{$proyecto->latitud}}, {{$proyecto->longitud}}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([{{$proyecto->latitud}}, {{$proyecto->longitud}}]).addTo(map);

        map.on('click', function(e){
            marker.setLatLng(e.latlng);
            
            var latitud = e.latlng.lat;
            var longitud = e.latlng.lng;
            document.getElementById('latitud').value = latitud;
            document.getElementById('longitud').value = longitud;
        });
    
    </script>@stop
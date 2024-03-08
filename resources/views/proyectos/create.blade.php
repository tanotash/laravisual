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
        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de la obra">
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de Proyecto</label>
        <input type="text" class="form-control" name="tipoProyecto" placeholder="Tipo de obra">
    </div>


    <div id="mapid" style="height: 400px;" >
    <label class="form-label">Ubicacion</label>


    <input type="hidden" id="latitud" name="latitud">
    <input type="hidden" id="longitud" name="longitud">
</div>


{{--     <div class="mb-3">
        <input type="text" class="form-control" name="ubicacion" placeholder="Ubicacion de la obra">
    </div> --}}
   
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

@stop

@section('js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('mapid').setView([21.1582976,-86.8548608], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([21.1582976,-86.8548608]).addTo(map);
         


        map.on('click', function(e){

            marker.setLatLng(e.latlng);
            
            var latitud = e.latlng.lat;
            var longitud = e.latlng.lng;
            document.getElementById('latitud').value = latitud;
            document.getElementById('longitud').value = longitud;
            L.marker([latitud, longitud]).addTo(map);
        });
    
    </script>
@stop
@extends('layouts.plantilla')
@section('title', 'Administrador')
 {{-- poner menu como plantilla --}}
@section('content')
<main>
    <div id="spinner" style="display: none;">
        <div class="spinner-border text-primary" role="status">
        </div>
        <span class="sr-only">Cargando...</span>
    </div>
    <div class="container">            
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" style="width: 250px;">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-image-container">
                        <img src="{{asset('assets/gestion_usuarios.jpg')}}" class="card-img-top card-image" alt="...">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Administradores</h5>
                        <p class="card-text">Gestión administradores.</p>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('administrador.listaAdministradores')}}" name="btn_ver_administradores" id="btn_ver_administradores" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>

                    </div>
                </div>
            </div>
            <div class="col" style="width: 250px;">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-image-container">
                        <img src="{{asset('assets/asignar_conductor.jpg')}}" class="card-img-top card-image" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Conductores</h5>
                        <p class="card-text">Gestión de conductores.</p>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('administrador.listaVehiculos')}}" name="btn_ver_conductores" id="btn_ver_conductores" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 250px;">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-image-container">
                        <img src="{{asset('assets/reservas.jpg')}}" class="card-img-top card-image" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Hoteles</h5>
                        <p class="card-text">Gestión de hoteles.</p>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('administrador.listaViajeros')}}" name="btn_ver_hoteles" id="btn_ver_hoteles" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 250px;">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-image-container">
                        <img src="{{asset('assets/viajeros.png')}}" class="card-img-top card-image" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Viajeros</h5>
                        <p class="card-text">Gestión de viajeros.</p>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('administrador.listaViajeros')}}" name="btn_ver_viajeros" id="btn_ver_viajeros" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                    </div>
                </div>
            </div>
            <!-- Agrega más columnas aquí según sea necesario -->
        </div>
    </div>
</main>
@endsection
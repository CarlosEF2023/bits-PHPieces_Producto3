@extends('layouts.plantilla')
@section('title', 'Administrador')
@section("nav")
@include('layouts.menu_nav')
@endsection
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
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/reservas.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Reservas</h5>
                            <p class="card-text">Realizar reservas de ida al aeropuerto, hotel o de ida y vuelta.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('administrador.reservas.menu') }}" name="btn_ver_reservas" id="btn_ver_reservas" type="button" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                            <!-- views/reservas/frm_rservas.php -->
                        </div>
                    </div>
                </div>
                <!--
                    <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/modificar_reserva.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Modificar reservas</h5>
                            <p class="card-text">Modificar una reserva en cualquier momento.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" name="listar_reservas" id="listar_reservas" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                -->
                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/reservas.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Listar reservas</h5>
                            <p class="card-text">Listar las reservas existentes por día/semana/mes o ver el histórico.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('administrador.reservas.listar') }}" type="button" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>

                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/asignar_conductor.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Asginar conductor</h5>
                            <p class="card-text">Asginar un conductor para el transfer.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" id="asignar_conductor" name="asignar_conductor" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/vista_trayectos.png')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Vista trayectos</h5>
                            <p class="card-text">Visualizar todos los trayectos disponibles.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/gestion_usuarios.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Gestión usuarios</h5>
                            <p class="card-text">Gestiona usuarios de empresa y conductores.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="{{ route('administrador.tiposUsuarios') }}" id="tipos_usuarios" name="tipos_usuarios" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/zonas.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Gestión de zonas</h5>
                            <p class="card-text">Gestiona las zonas.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" id="zonas" name="zonas" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col" style="width: 250px;">
                    <div class="card h-100">
                        <div class="card-image-container">
                            <img src="{{asset('assets/tiposTrayectos.jpg')}}" class="card-img-top card-image" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Tipos de reservas</h5>
                            <p class="card-text">Mostrar tipos de reservas.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" id="lista_reservas" name="lista_reservas" class="btn btn-outline-dark"><i class="bi bi-door-open"></i> Acceder</a>
                        </div>
                    </div>
                </div>
                <!-- Agrega más columnas aquí según sea necesario -->
            </div>
        </div>
    </main>
@endsection

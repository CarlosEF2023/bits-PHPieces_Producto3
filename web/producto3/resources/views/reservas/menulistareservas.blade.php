@extends('layouts.plantilla')
@section('title', 'Menú de listado de reservas')

@section("navbar")
@include('layouts.menu_nav')
@endsection

@section('content')
<div class="d-flex align-items-center justify-content-center" name="reservas" id="reservas">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas de Hoy</h5>
                        <p class="card-text">Revisa las reservas que tienes para hoy</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        
                    @if (Session::get('usertype')!="6")
                        <a href="{{ route(Session::get('userroute').'.reservas.listar.dia', ['tipoReporte' => 'dia', 'tipoDeReserva' => '9999', 'id' => Session::get('id'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservasdia" id="reservasdia" class="btn btn-primary">Ver reservas del día</a>
                    @else
                        <a href="{{ route(Session::get('userroute').'.reservas.listar.dia', ['tipoReporte' => 'dia', 'tipoDeReserva' => '9999', 'id' => Session::get('mail'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservasdia" id="reservasdia" class="btn btn-primary">Ver reservas del día</a>
                    @endif

                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas de la semana</h5>
                        <p class="card-text">Revisa tu planificación semanal</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    @if (Session::get('usertype')!="6")
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.semana', ['tipoReporte' => 'semana', 'tipoDeReserva' => '9999', 'id' => Session::get('id'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservassemana" id="reservassemana" class="btn btn-primary">Ver reservas de la semana</a>
                        @else
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.semana', ['tipoReporte' => 'semana', 'tipoDeReserva' => '9999', 'id' => Session::get('mail'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservassemana" id="reservassemana" class="btn btn-primary">Ver reservas de la semana</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas del mes</h5>
                        <p class="card-text">Revisa tu planificación mensual</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        @if (Session::get('usertype')!="6")
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.mes', ['tipoReporte' => 'mes', 'tipoDeReserva' => '9999', 'id' => Session::get('id'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservasmes" id="reservasmes" class="btn btn-primary">Ver reservas del mes</a>
                        @else
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.mes', ['tipoReporte' => 'mes', 'tipoDeReserva' => '9999', 'id' => Session::get('mail'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservasmes" id="reservasmes" class="btn btn-primary">Ver reservas del mes</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Historico de reservas</h5>
                        <p class="card-text">Revisa todas las reservas realizadas</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    @if (Session::get('usertype')!="6")
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.todas', ['tipoReporte' => 'todas', 'tipoDeReserva' => '9999', 'id' => Session::get('id'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservastotales" id="reservastotales" class="btn btn-primary">Historico de reservas</a>
                        @else
                            <a href="{{ route(Session::get('userroute').'.reservas.listar.todas', ['tipoReporte' => 'todas', 'tipoDeReserva' => '9999', 'id' => Session::get('mail'), 'tipoUsuario' => Session::get('usertype')]) }}" name="reservastotales" id="reservastotales" class="btn btn-primary">Historico de reservas</a>
                        @endif
                    </div>
                </div>
            </div>
           <!-- Agrega más columnas aquí según sea necesario -->
           </div>
    </div>
@endsection
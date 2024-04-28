@extends('layouts.plantilla')
@section('title', 'Menú de conductores / vehículos')

@section('content')
<br>
<h1>Vehículo</h1>
<br>
<div class="d-flex align-items-center justify-content-center" name="reservas" id="reservas">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Itinerario para hoy</h5>
                        <p class="card-text">Revisa el itinerario de recogidas y entregas para hoy día {{ date("d-M-Y") }}.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                     <a href="{{ route(Session::get('userroute').'.itinerario', ['tramo' => 'dia', 'fecha' => date("Y-M-d"), 'conductor' => Session::get('id')]) }}" name="reservasdia" id="reservasdia" class="btn btn-primary">Ver itinerario del día</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Itinerarios para la semana</h5>
                        <p class="card-text">Revisa el itinerario de recogidas y entregas de la semana {{ date ("W") }}.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        <a href="{{ route(Session::get('userroute').'.itinerario', ['tramo' => 'semana', 'fecha' => date("Y-M-d"), 'conductor' => Session::get('id')]) }}" name="reservassemana" id="reservassemana" class="btn btn-primary">Ver itinerarios de la semana</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="{{ asset('assets/reservas.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Itinerarios del mes</h5>
                        <p class="card-text">Revisa el itinerario de recogidas y entregas del mes de {{ date("M") }}.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        <a href="{{ route(Session::get('userroute').'.itinerario', ['tramo' => 'mes', 'fecha' => date("Y-M-d"), 'conductor' => Session::get('id')]) }}" name="reservasmes" id="reservasmes" class="btn btn-primary">Ver itinerarios del mes</a>
                    </div>
                </div>
            </div>
            <!-- Agrega más columnas aquí según sea necesario -->
        </div>
</div>
@endsection
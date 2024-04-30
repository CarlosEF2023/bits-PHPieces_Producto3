@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">
            <h1 class="card-title"> LOCALIZADOR: {{ $reservas->localizador }}</h1>
            <a href="{{ back()->getTargetUrl() }}" class="btn btn-primary">Volver</a>

        </div>
    <div class="card-body">
        <h3 class="card-title">Recogida aeropuerto</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Día de llegada</span>
            <input class="form-control" name="diadellegada" id="diadellegada" type="date" value="{{ $reservas->fecha_entrada }}" disabled>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de llegada</span>
            <input class="form-control" name="horadellegada" id="horadellegada" type="time" value="{{ $reservas->hora_entrada }}" disabled>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de vuelo</span>
            <input class="form-control" name="numerovuelo" id="numerovuelo" type="text" value="{{ $reservas->numero_vuelo_entrada }}" disabled>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Aeropueto Origen</span>
            <input class="form-control" name="aeropuertoorigen" id="aeropuertoorigen" type="text" value="{{ $reservas->origen_vuelo_entrada }}" disabled>
        </div>
        <!-- VER PARTE COMÚN -->
        <h3 class="card-title">Hotel destino</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Hotel recogida</span>
            <x-hotel-select :selected="$reservas->id_destino" name="hoteldestino" /> 
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de viajeros</span>
            <input class="form-control" name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" value="{{ $reservas->num_viajeros }}" disabled>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">email reserva</span>
            <input class="form-control" name="emailreserva" id="emailreserva" type="mail" value="{{ $reservas->email_cliente }}">
        </div>
    </div>
    </div>
</div>
</div>
<br><br><br><br>

@endsection

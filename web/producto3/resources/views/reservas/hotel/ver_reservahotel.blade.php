@extends('layouts.plantilla')
@section('title', 'Reservas del Hotel al Aeropuerto')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">
            <h1 class="card-title"> LOCALIZADOR: {{ $reservas->localizador }}</h1>
            <a href="{{ back()->getTargetUrl() }}" class="btn btn-primary">Volver</a>

        </div>
    <div class="card-body">
        <h3 class="card-title">Salida del Hotel</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Día de salida</span>
            <input class="form-control" name="diadesalida" id="diadesalida" type="date" VALUE="{{ $reservas->fecha_vuelo_salida }}" disabled \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de salida</span>
            <input class="form-control" name="horadesalida" id="horadesalida" type="time" VALUE="{{ $reservas->hora_vuelo_salida }}" disabled \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de recogida en el Hotel</span>
            <input class="form-control" name="horaderecogida" id="horaderecogida" type="time" VALUE="{{ $reservas->hora_recogida_hotel }}" disabled \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de vuelo</span>
            <input class="form-control" name="numerovuelo" id="numerovuelo" type="text" VALUE="{{ $reservas->numero_vuelo_entrada }}" disabled \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Aeropueto Origen</span>
            <input class="form-control" name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="{{ $reservas->origen_vuelo_entrada }}" disabled \>
        </div>
        <!-- PARTE COMUN -->
        <h3 class="card-title">Hotel destino</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Hotel recogida</span>
            <x-hotel-select :selected="$reservas->id_destino" name="hoteldestino" /> 
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de viajeros</span>
            <input class="form-control" name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="{{$reservas->num_viajeros}}" disabled \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">email reserva</span>
            <input class="form-control" name="emailreserva" id="emailreserva" type="mail" value="{{$reservas->email_cliente}}">
        </div>
</div>
        </div>
    </div>
</div>
<br><br><br><br>
@endsection
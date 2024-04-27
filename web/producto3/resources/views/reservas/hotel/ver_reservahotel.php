@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel ida y vuelta')

@section('content')

<h1> LOCALIZADOR: {{ $reservas->localizador }}</h1>

<h3>Salida del Hotel</h3>
<div class="row">
    <label class="float-left label-width">Día de salida</label>
    <input name="diadesalida" id="diadesalida" type="date" VALUE="{{ $reservas->fecha_vuelo_salida }}" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de salida</label>
    <input name="horadesalida" id="horadesalida" type="time" VALUE="{{ $reservas->hora_vuelo_salida }}" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de recogida en el Hotel</label>
    <input name="horaderecogida" id="horaderecogida" type="time" VALUE="{{ $reservas->hora_recogida_hotel }}" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Número de vuelo</label>
    <input name="numerovuelo" id="numerovuelo" type="text" VALUE="{{ $reservas->numero_vuelo_entrada }}" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Aeropueto Origen</label>
    <input name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="{{ $reservas->origen_vuelo_entrada }}" disabled \>
</div>
<!-- PARTE COMUN -->
<h3>Hotel destino</h3>
<div class="row">
    <label class="float-left label-width">Hotel recogida</label>
    <x-hotel-select :selected="{{$reservas->id_destino}}" name="nombreselect" /> 
</div>
<div class="row">
    <label class="float-left label-width">Número de viajeros</label>
    <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="{{$reservas->num_viajeros}}" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">email reserva</label>
    <input name="emailreserva" id="emailreserva" type="mail" value="{{$reservas->email_cliente}}">
</div>

@endsection
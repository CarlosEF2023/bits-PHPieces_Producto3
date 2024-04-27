@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel')

@section('content')

<form method="POST" action="/~uocx1/controllers/reservas/modificar_reserva_sql.php">'
@csrf   
@method('PUT') 

<h1> LOCALIZADOR: {{ $reservas->localizador }} </h1>

<h3>Recogida aeropuerto</h3>
<div class="row">
    <label class="float-left label-width">Día de llegada</label>
    <input name="diadellegada" id="diadellegada" type="date" VALUE="{{ $reservas->fecha_entrada }}" \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de llegada</label>
    <input name="horadellegada" id="horadellegada" type="time" VALUE="{{ $reservas->hora_entrada }}" \>
</div>
<div class="row">
    <label class="float-left label-width">Número de vuelo</label>
    <input name="numerovuelo" id="numerovuelo" type="text" VALUE="{{ $reservas->numero_vuelo_entrada }}" \>
</div>
<div class="row">
    <label class="float-left label-width">Aeropueto Origen</label>
    <input name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="{{ $reservas->origen_vuelo_entrada }}" \>
</div>
<!-- PARTE COMÚN -->
<h3>Hotel destino</h3>
<div class="row">
    <label class="float-left label-width">Hotel recogida</label>
    <x-hotel-select :selected="{{$reservas->id_destino}}" name="hoteldestino" /> 
</div>
<div class="row">
    <label class="float-left label-width">Número de viajeros</label>
    <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="{{ $reservas->num_viajeros }}" \>
</div>
<div class="row">
    <label class="float-left label-width">email reserva</label>
    @if (Session::get('usertype')!="6")
        <x-viajero-select :selected="{{ $reservas->email_cliente }}" name="emailreserva" />     
    <!-- <input name="emailreserva" id="emailreserva" type="mail" value=""> -->
    @else
        <input name="emailreserva" id="emailreserva" type="mail" value="{{ $reservas->email_cliente }}">
    @endif
</div>
<br>
<button type="submit" class="btn btn-primary" name="enviar" id="enviar" >Validar cambios</button>
<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>

</form>

@endsection
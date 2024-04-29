@extends('layouts.plantilla')
@section('title', 'Reservas del Hotel all Aeropuerto')

@section('content')
<form method="POST" name="checkout-form" id="checkout-form" action="{{Route(Session::get('userroute').'.reservas.del')}}">
@csrf   
@method('PUT') 
<input type="hidden" name="idtiporeserva" id="idtiporeserva" value="3">
<input name="id_reserva" id="id_reserva" type="hinned" VALUE="{{ $reservas->id_reserva }}" \>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"> LOCALIZADOR: {{ $reservas->localizador }}</h1>
            </div>
        <div class="card-body">

        <h3 class="card-title">Recogida aeropuerto</h3>
        <div class="input-group mb-4">
            <span class="input-group-text">Día de llegada</span>
            <input class="form-control" name="diadellegada" id="diadellegada" type="date" VALUE="{{ $reservas->fecha_entrada }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de llegada</span>
            <input class="form-control" name="horadellegada" id="horadellegada" type="time" VALUE="{{ $reservas->hora_entrada }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de vuelo</span>
            <input class="form-control" name="numerovuelo" id="numerovuelo" type="text" VALUE="{{ $reservas->numero_vuelo_entrada }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Aeropueto Origen</span>
            <input class="form-control" name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="{{ $reservas->origen_vuelo_entrada }}" \>
        </div>

        <!-- Recogida Hotel -->
        <h3 class="card-title">Salida del Hotel</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Día de salida</span>
            <input class="form-control" name="diadesalida" id="diadesalida" type="date" VALUE="{{ $reservas->fecha_vuelo_salida }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de salida</span>
            <input class="form-control" name="horadesalida" id="horadesalida" type="time" VALUE="{{ $reservas->hora_vuelo_salida }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Hora de recogida en el Hotel</span>
            <input class="form-control" name="horaderecogida" id="horaderecogida" type="time" VALUE="{{ $reservas->hora_recogida_hotel }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de vuelo</span>
            <input class="form-control" name="numerovuelo" id="numerovuelo" type="text" VALUE="{{ $reservas->numero_vuelo_entrada }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Aeropueto Origen</span>
            <input class="form-control" name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="{{ $reservas->origen_vuelo_entrada }}" \>
        </div>

        <!-- Parte Común -->
        <h3 class="card-title">Hotel destino</h3>
        <div class="input-group mb-4">
        <span class="input-group-text">Hotel recogida</span>
            <x-hotel-select :selected="$reservas->id_destino" name="hoteldestino" /> 
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">Número de viajeros</span>
            <input class="form-control" name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="{{ $reservas->num_viajeros }}" \>
        </div>
        <div class="input-group mb-4">
        <span class="input-group-text">email reserva</span>
            @if (Session::get('usertype')!="6")
                <x-viajero-select :selected="{{ $reservas->email_cliente }}" name="emailreserva" />     
            <!-- <input name="emailreserva" id="emailreserva" type="mail" value=""> -->
            @else
                <input class="form-control" name="emailreserva" id="emailreserva" type="mail" value="{{ $reservas->email_cliente }}">
            @endif
        </div>
        </div>
        <div class="card-foot">
    <button type="submit" class="btn btn-primary" name="enviar" id="enviar"> Eliminar</button>
    <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
    </div>

        </div>
    </div>

</div>
</form>
<br><br><br><br>
@endsection
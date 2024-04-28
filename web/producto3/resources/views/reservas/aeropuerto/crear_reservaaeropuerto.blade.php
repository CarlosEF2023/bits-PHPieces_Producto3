@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <div class="card">
    <div class="phppot-container" name="resulado_reserva" id="resulado_reserva">
            <h1>Reserva trayecto Aeropuerto al Hotel</h1>

            <form method="POST" name="checkout-form" id="checkout-form" action="{{Route(Session::get('userroute').'.reservas.nuevo')}}">
                @csrf
                <input type="hidden" name="idtiporeserva" id="idtiporeserva" value="1">
                @if (Session::get('usertype')=="5")
                    <input type="hidden" name="idhotelreserva" id="idhotelreserva" value="999">
                @else
                    <input type="hidden" name="idhotelreserva" id="idhotelreserva" value="{{ Session::get('id') }}">
                @endif

                <div class="wizard-flow-chart">
                    <span class="fill">1</span>
                    <span>2</span>
                    <span>3</span>
                </div>
                <!-- Wizard section 1 -->
                <section id="aeropuerto_hotel">
                    <h3>Recogida aeropuerto</h3>
                    <div class="row">
                        <label class="float-left label-width">Día de llegada</label>
                        <input name="diadesalida" id="diadesalida" type="date" min="{{ \Carbon\Carbon::now()->addDays(2)->format('Y-m-d') }}" max="{{ \Carbon\Carbon::now()->addDays(15)->format('Y-m-d') }}">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Hora de llegada</label>
                        <input name="horadellegada" id="horadellegada" type="time">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Número de vuelo</label>
                        <input name="numerovuelo" id="numerovuelo" type="text">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Aeropueto Origen</label>
                        <input name="aeropuertoorigen" id="aeropuertoorigen" type="text">
                    </div>
                    <div class="row button-row">
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-success" type="button" onClick="validate(this)">Siguiente</button>
                        <a class="btn btn-outline-danger cancelar" href="#" class="btn">Cancelar</a>
                    </div>
                    </div>
                </section>

                <!-- Wizard section 2 -->
                <section id="HotelDestino" class="display-none">
                    <h3>Hotel destino</h3>
                    <div class="row">
                        <label class="float-left label-width">Hotel destino</label>
                        <x-hotel-select :selected="0" name="Hotel_Destino" />
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Número de viajeros</label>
                        <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8">
                    </div>
                    <!-- Si es administrador u Hotel pueden crearla en nombre del usuario -->
                    <div class="row">
                        <label class="float-left label-width">email reserva</label>
                         @if (Session::get('usertype')!="6")
                            <x-viajero-select :selected="0" name="emailreserva" />     
                        <!-- <input name="emailreserva" id="emailreserva" type="mail" value=""> -->
                        @else
                            <input name="emailreserva" id="emailreserva" type="mail" value="{{ Session::get('mail') }}">
                        @endif
                    </div>

                    <div class="row button-row">
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary" type="button" onClick="showPrevious(this)">Anterior</button>
                        <button class="btn btn-outline-success" type="button" onClick="validate(this)">Siguiente</button>
                        <a class="btn btn-danger cancelar" href="#" class="btn">Cancelar</a>
                        </div>
                    </div>
                </section>


                <!-- Wizard section 3 -->
                <section id="checkin_reserva" class="display-none">
                    <h3>Realizar check-in de la reserva</h3>
                    <div class="card" id="datosreserva" name="datosreserva">
                        <br>
                    </div>
                    <p>Pulse 'Enviar' si está todo correcto.<br>En breve recibirá un mail con los datos de la reserva.</p>
                    <div class="row button-row">
                        <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary" type="button" onClick="showPrevious(this)">Anterior</button>
                        <button class="btn btn-outline-success" type="submit">Enviar</button>
                        <a class="btn btn-danger cancelar" href="#" class="btn">Cancelar</a>
                    </div>
                    </div>
                </section>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="modal" name="myModal" id="myModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <form name="formulario_modal">
            <h5 class="modal-title" name="titulo_modal"id="titulo_modal">Validar reserva</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" name="cuerpo_modal" id="cuerpo_modal">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-outline-primary" name="aceptarmodal" id="aceptarmodal">Validar</button>
        </form>
      </div>
    </div>
  </div>

  @endsection
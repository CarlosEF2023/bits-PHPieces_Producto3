@extends('layouts.plantilla')
@section('title', 'Reservas del Hotel all Aeropuerto')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <div class="card">

    <div class="phppot-container">
            <h1>Reserva trayecto Aeropuerto al Hotel</h1>

            <form method="POST" id="checkout-form" action="/~uocx1/controllers/reservas/crear_reserva_sql.php" action="POST">
                <input type="hidden" name="idtiporeserva" id="idtiporeserva" value="1">
                <div class="wizard-flow-chart">
                    <span class="fill">1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                </div>
                <!-- Wizard section 1 -->
                <section id="aeropuerto_hotel">
                    <h3>Recogida aeropuerto</h3>
                    <div class="row">
                        <label class="float-left label-width">Día de llegada</label>
                        <input name="diadellegada" id="diadellegada" type="date" min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>" max="<?php echo date('Y-m-d', strtotime('+15 day')); ?>">
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
                <section id="hotel_aeropuerto" class="display-none">
                    <h3>Salida del Hotel</h3>
                    <div class="row">
                        <label class="float-left label-width">Día de salida</label>
                        <input name="diadesalida" id="diadesalida" type="date"  min="<?php echo date('Y-m-d', strtotime('+2 day')); ?>" max="<?php echo date('Y-m-d', strtotime('+15 day')); ?>">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Hora de salida</label>
                        <input name="horadesalida" id="horadesalida" type="time">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Hora de recogida en el Hotel</label>
                        <input name="horaderecogida" id="horaderecogida" type="time">
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

            <!-- Wizard section 3 -->
            <section id="Datos_comunes" class="display-none">
                    <h3>Hotel destino</h3>
                    <div class="row">
                        <label class="float-left label-width">Hotel recogida</label>
                        <?php
                        $t->comboHotel("", "Hotel_Destino");
                        ?>
                    </div>
                    <div class="row">
                        <label class="float-left label-width">Número de viajeros</label>
                        <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8">
                    </div>
                    <div class="row">
                        <label class="float-left label-width">email reserva</label>
                        <input name="emailreserva" id="emailreserva" type="mail" value="<?php echo $_SESSION["email"]; ?>">
                    </div>
                    <div class="row button-row">
                    <div class="row button-row">
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary" type="button" onClick="showPrevious(this)">Anterior</button>
                        <button class="btn btn-outline-success" type="button" onClick="validate(this)">Siguiente</button>
                        <a class="btn btn-danger cancelar" href="#" class="btn">Cancelar</a>
                        </div>
                    </div>
                </section>


                <!-- Wizard section 4 -->
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
</div>

@endsection
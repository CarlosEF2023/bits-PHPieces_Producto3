@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel ida y vuelta')

@section('content')
<?php
echo '<form method="POST" action="/~uocx1/controllers/reservas/eliminar_reserva_sql.php">';

echo "<h1> LOCALIZADOR: ".$bbdd_reservas->get_Localizador()."</h1>";

echo '<input name="idreserva" id="idreserva" type="hidden" VALUE="'.$bbdd_reservas->get_Id_Reserva().'"\>';
?>

<h3>Salida del Hotel</h3>
<div class="row">
    <label class="float-left label-width">Día de salida</label>
    <input name="diadesalida" id="diadesalida" type="date" VALUE="<?php echo $bbdd_reservas->get_Fecha_Vuelo_Salida(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de salida</label>
    <input name="horadesalida" id="horadesalida" type="time" VALUE="<?php echo $bbdd_reservas->get_Hora_Vuelo_Salida(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de recogida en el Hotel</label>
    <input name="horaderecogida" id="horaderecogida" type="time" VALUE="<?php echo $bbdd_reservas->get_Hora_Recogida_Hotel(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Número de vuelo</label>
    <input name="numerovuelo" id="numerovuelo" type="text" VALUE="<?php echo $bbdd_reservas->get_Numero_Vuelo_Entrada(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Aeropueto Origen</label>
    <input name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="<?php echo $bbdd_reservas->get_Origen_Vuelo_Entrada(); ?>" disabled \>
</div>

<!-- PARTE COMÚN -->

<h3>Hotel destino</h3>
<div class="row">
    <label class="float-left label-width">Hotel recogida</label>
    <input name="hoteldestino" id="hoteldestino" type="text"  VALUE="<?php echo $bbdd_reservas->get_Id_Destino(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">Número de viajeros</label>
    <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="<?php echo $bbdd_reservas->get_Num_Viajeros(); ?>" disabled \>
</div>
<div class="row">
    <label class="float-left label-width">email reserva</label>
    <input name="emailreserva" id="emailreserva" type="mail" value="<?php echo $bbdd_reservas->get_Email_Cliente(); ?>">
</div>
<br>
<button type="submit" class="btn btn-primary" name="enviar" id="enviar" >Eliminar reserva</button>
<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>

</form>
@endsection
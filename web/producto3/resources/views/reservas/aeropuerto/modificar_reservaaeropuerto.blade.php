@extends('layouts.plantilla')
@section('title', 'Reservas del Aeropuerto al Hotel')

@section('content')

<?php
echo '<form method="POST" action="/~uocx1/controllers/reservas/modificar_reserva_sql.php">';
echo "<h1> LOCALIZADOR: ".$bbdd_reservas->get_Localizador()."</h1>";
?>
<h3>Recogida aeropuerto</h3>
<div class="row">
    <label class="float-left label-width">Día de llegada</label>
    <input name="diadellegada" id="diadellegada" type="date" VALUE="<?php echo $bbdd_reservas->get_Fecha_Entrada(); ?>" \>
</div>
<div class="row">
    <label class="float-left label-width">Hora de llegada</label>
    <input name="horadellegada" id="horadellegada" type="time" VALUE="<?php echo $bbdd_reservas->get_Hora_Entrada(); ?>" \>
</div>
<div class="row">
    <label class="float-left label-width">Número de vuelo</label>
    <input name="numerovuelo" id="numerovuelo" type="text" VALUE="<?php echo $bbdd_reservas->get_Numero_Vuelo_Entrada(); ?>" \>
</div>
<div class="row">
    <label class="float-left label-width">Aeropueto Origen</label>
    <input name="aeropuertoorigen" id="aeropuertoorigen" type="text" VALUE="<?php echo $bbdd_reservas->get_Origen_Vuelo_Entrada(); ?>" \>
</div>
<!-- PARTE COMÚN -->
<h3>Hotel destino</h3>
<div class="row">
    <label class="float-left label-width">Hotel recogida</label>

    <?php
    $t->comboHotel($bbdd_reservas->get_Id_Destino(), "hoteldestino");
    ?>
</div>
<div class="row">
    <label class="float-left label-width">Número de viajeros</label>
    <input name="numeroviajeros" id="numeroviajeros" type="number" min="1" max="8" VALUE="<?php echo $bbdd_reservas->get_Num_Viajeros(); ?>" \>
</div>
<div class="row">
    <label class="float-left label-width">email reserva</label>
    <input name="emailreserva" id="emailreserva" type="mail" value="<?php echo $bbdd_reservas->get_Email_Cliente(); ?>" >
</div>
<br>
<button type="submit" class="btn btn-primary" name="enviar" id="enviar" >Validar cambios</button>
<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>

</form>

@endsection
@extends('plantilla')

@section('contenido')
<?php
error_reporting(0);
session_start();
require_once ("../../controllers/check_connection.php");
$_SESSION["mensaje"]="";
include_once "../header.php";
include_once "../menu.php";
echo "<br><div class='container-fluid'>";
echo "<table class='table table-bordered table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>Localizador</th>";
echo "<th>Tipo reserva</th>";
echo "<th>usuario</th>";
echo "<th>Fecha reserva</th>";
echo "<th>Fecha Entrada</th>";
echo "<th>Hora Entada</th>";
echo "<th>Hotel</th>";
echo "<th>Fecha Salida</th>";
echo "<th>Hora Salida</th>";
echo "<th>Asignar<br>Conductor</th>";
echo "</thead>";
echo "<tbody>";
$datos= json_decode($_GET['dat'], true);
foreach ($datos AS $info){
    echo "<tr>";
    echo "<td>".$info["localizador"]."</td>";
    echo "<td>".$info["Descripción"]."</td>";
    echo "<td>".$info["email_cliente"]."</td>";
    echo "<td>".$info["fecha_reserva"]."</td>";
    echo "<td>".$info["fecha_entrada"]."</td>";
    echo "<td>".$info["hora_entrada"]."</td>";
    echo "<td>".$info["NombreHotel"]."</td>";
    echo "<td>".$info["fecha_vuelo_salida"]."</td>";
    echo "<td>".$info["hora_vuelo_salida"]."</td>";
    echo "<td><a href='#' class='asignarconductor' id='asigna_conductor' name='asigna_conductor' data=>Asignar conductor</td>";
    echo "</tr>";
}
echo "</tbody>";
?>
@endsection
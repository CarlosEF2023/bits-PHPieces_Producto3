@extends('plantilla')

@section('contenido')
<?php
session_start();
require_once "../../models/transfer_vehiculo.php";
$conductor= new transfer_vehiculo("", "", "", "", "");
$tramo_informe= $_POST["filtro"];
$fecha_actual= date("Y-m-d");
$id_conductor= $_SESSION["identificador"];
$listado= $conductor->filtrar_conductor_tramo($tramo_informe, $fecha_actual, $id_conductor);
?>

<table class="table table-striped table-hover">

<head>
    <tr>
        <th>Localizador</th>
        <th>Tipo reserva</th>
        <th>Recoger en</th>
        <th>Fecha de recogida</th>
        <th>Hora de recogida</th>
        <th>Destino</th>
        <th>Usuario</th>
        <th>Número viajeros</th>
    </tr>
</head>
<body>

<div id="containerVer">
<?php 
    foreach($listado as $data){
        echo"<tr>";
        switch ($data["id_tipo_reserva"]){
            case '1':
                // Aeropuerto -> Hotel
                echo"<th>".$data["localizador"]."</th>";
                echo"<td>".$data["Descripción"]."</td>";
                echo"<td>".$data["origen_vuelo_entrada"]." / ".$data["numer_vuelo_entrada"]."</td>";
                echo"<td>".$data["fecha_entrada"]."</td>";
                echo"<td>".$data["hora_entrada"]."</td>";
                echo"<td>".$data["NombreHotel"]."</td>";
                echo"<td>".$data["email_cliente"]."</td>";
                echo"<td>".$data["num_viajeros"]."</td>";
                break;
            case '2':
                // Hotel -> Aeropuerto
                echo"<th>".$data["localizador"]."</th>";
                echo"<td>".$data["Descripción"]."</td>";
                echo"<td>".$data["NombreHotel"]."</td>";
                echo"<td>".$data["fecha_vuelo_salida"]."</td>";
                echo"<td>".$data["hora_recogida_hotel"]."</td>";
                echo"<td>".$data["origen_vuelo_entrada"]."</td>";
                echo"<td>".$data["email_cliente"]."</td>";
                echo"<td>".$data["num_viajeros"]."</td>";
                break;
            case '3':
                // Completo
                echo"<th>".$data["localizador"]."</th>";
                echo"<td>".$data["Descripción"]."</td>";
                echo"<td>".$data["origen_vuelo_entrada"]." / ".$data["numer_vuelo_entrada"]."</td>";
                echo"<td>".$data["fecha_entrada"]."</td>";
                echo"<td>".$data["hora_entrada"]."</td>";
                echo"<td>".$data["NombreHotel"]."</td>";
                echo"<td>".$data["email_cliente"]."</td>";
                echo"<td>".$data["num_viajeros"]."</td>";
                echo "</tr><tr>";
                echo"<th>".$data["localizador"]."</th>";
                echo"<td>".$data["Descripción"]."</td>";
                echo"<td>".$data["NombreHotel"]."</td>";
                echo"<td>".$data["fecha_vuelo_salida"]."</td>";
                echo"<td>".$data["hora_recogida_hotel"]."</td>";
                echo"<td>".$data["origne_vuelo_entrada"]."</td>";
                echo"<td>".$data["origen_vuelo_entrada"]."</td>";
                echo"<td>".$data["email_cliente"]."</td>";
                echo"<td>".$data["num_viajeros"]."</td>";
                break;
        }
    echo"</tr>";
}

?>
    </div>
</body>

</table>
@endsection
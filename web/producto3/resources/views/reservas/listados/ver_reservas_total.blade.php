@extends('plantilla')

@section('contenido')
<?php
error_reporting(0);
session_start();

echo "<br><div class='card'>";
echo "<table class='table table-bordered table-striped table-hover'>";
echo "<thead class='table-dark'>";
echo "<tr>";
echo "<th>Localizador</th>";
echo "<th>Tipo reserva</th>";
echo "<th>usuario</th>";
echo "<th>Fecha reserva</th>";
echo "<th>Hotel</th>";
echo "<th>Fecha Entrada</th>";
echo "<th>Hora Entada</th>";
echo "<th>Hora Recogida</th>";
echo "<th>Aeropuerto</th>";
echo "<th>Fecha Salida</th>";
echo "<th>Hora Salida</th>";
echo "<th colspan='3'>Opciones</th>";
echo "</thead>";
echo "<tbody>"; 

foreach ($matrizresultado as $info){
    echo "<tr>";
    echo "<td>".$info["localizador"]."</td>";       // localizador
    echo "<td>".$info["Descripción"]."</td>";       // tipo reserva
    echo "<td>".$info["email_cliente"]."</td>";     // usuario
    echo "<td>".$info["fecha_reserva"]."</td>";     // fecha reserva
    switch($info["id_tipo_reserva"]){
        case "1":
            echo "<td>".$info["NombreHotel"]."</td>";   // nombre hotel
            echo "<td>".$info["fecha_entrada"]."</td>"; // fecha entrada
            echo "<td>".$info["hora_entrada"]."</td>";  // hora entrada
            echo "<td>N/A</td>";                        // hora recogida
            echo "<td>N/A</td>";                        // Aeropuerto
            echo "<td>N/A</td>";                        // Fecha salida
            echo "<td>N/A</td>";                        // Hora salida
            break;
        case "2":
            echo "<td>".$info["NombreHotel"]."</td>";           // nombre hotel
            echo "<td>N/A</td>";                                // fecha entrada
            echo "<td>N/A</td>";                                // hora entrada
            echo "<td>".$info["hora_recogida_hotel"]."</td>";   // hora recogida
            echo "<td>".$info["origen_vuelo_entrada"]."</td>";  // Aeropuerto
            echo "<td>".$info["fecha_vuelo_salida"]."</td>";    // Fecha salida
            echo "<td>".$info["hora_vuelo_salida"]."</td>";     // Hora salida
            break;      
        case "3":
            echo "<td>".$info["NombreHotel"]."</td>";           // nombre hotel
            echo "<td>".$info["fecha_entrada"]."</td>";         // fecha entrada
            echo "<td>".$info["hora_entrada"]."</td>";          // hora entrada
            echo "<td>".$info["hora_recogida_hotel"]."</td>";   // hora recogida
            echo "<td>".$info["origen_vuelo_entrada"]."</td>";  // Aeropuerto
            echo "<td>".$info["fecha_vuelo_salida"]."</td>";    // Fecha salida
            echo "<td>".$info["hora_vuelo_salida"]."</td>";     // Hora salida
            break; 
    }
    
    echo "<td><a href='#' class='btn btn-outline-success ver_reserva' id='ver_reserva' name='ver_reserva' data='".$info["id_reserva"]."'><img src='/~uocx1/assets/visibility_FILL0_wght400_GRAD0_opsz24.svg'></td>";
    echo "<td><a href='#' class='btn btn-outline-primary modificar_reserva' id='modificar_reserva' name='modificar_reserva' data='".$info["id_reserva"]."'><img src='/~uocx1/assets/edit_FILL0_wght400_GRAD0_opsz24.svg'></td>";
    echo "<td><a href='#' class='btn btn-outline-danger eliminar_reserva' id='eliminar_reserva' name='eliminar_reserva' data='".$info["id_reserva"]."'><img src='/~uocx1/assets/delete_FILL0_wght400_GRAD0_opsz24.svg'></td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
@endsection
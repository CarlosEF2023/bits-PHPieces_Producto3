@extends('layouts.plantilla')
@section('title', 'Reservas del Hotel all Aeropuerto')

@section('content')

<table class="table table-striped table-hover">

<thead>
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
</thead>
<tbody>

<div id="containerVer">

@foreach($listado as $data)
    <tr>
        @switch($data['id_tipo_reserva'])
            @case(1)
                <!-- Aeropuerto -> Hotel -->
                <th>{{ $data['localizador'] }}</th>
                <td>{{ $data['Descripción'] }}</td>
                <td>{{ $data['origen_vuelo_entrada'] }} / {{ $data['numer_vuelo_entrada'] }}</td>
                <td>{{ $data['fecha_entrada'] }}</td>
                <td>{{ $data['hora_entrada'] }}</td>
                <td>{{ $data['NombreHotel'] }}</td>
                <td>{{ $data['email_cliente'] }}</td>
                <td>{{ $data['num_viajeros'] }}</td>
                @break

            @case(2)
                <!-- Hotel -> Aeropuerto -->
                <th>{{ $data['localizador'] }}</th>
                <td>{{ $data['Descripción'] }}</td>
                <td>{{ $data['NombreHotel'] }}</td>
                <td>{{ $data['fecha_vuelo_salida'] }}</td>
                <td>{{ $data['hora_recogida_hotel'] }}</td>
                <td>{{ $data['origen_vuelo_entrada'] }}</td>
                <td>{{ $data['email_cliente'] }}</td>
                <td>{{ $data['num_viajeros'] }}</td>
                @break

            @case(3)
                <!-- Completo -->
                <th>{{ $data['localizador'] }}</th>
                <td>{{ $data['Descripción'] }}</td>
                <td>{{ $data['origen_vuelo_entrada'] }} / {{ $data['numer_vuelo_entrada'] }}</td>
                <td>{{ $data['fecha_entrada'] }}</td>
                <td>{{ $data['hora_entrada'] }}</td>
                <td>{{ $data['NombreHotel'] }}</td>
                <td>{{ $data['email_cliente'] }}</td>
                <td>{{ $data['num_viajeros'] }}</td>
                </tr><tr>
                <th>{{ $data['localizador'] }}</th>
                <td>{{ $data['Descripción'] }}</td>
                <td>{{ $data['NombreHotel'] }}</td>
                <td>{{ $data['fecha_vuelo_salida'] }}</td>
                <td>{{ $data['hora_recogida_hotel'] }}</td>
                <td>{{ $data['origen_vuelo_entrada'] }}</td>
                <td>{{ $data['origen_vuelo_entrada'] }}</td>
                <td>{{ $data['email_cliente'] }}</td>
                <td>{{ $data['num_viajeros'] }}</td>
                @break
        @endswitch
    </tr>
@endforeach

</div>
</tbody>

</table>
@endsection
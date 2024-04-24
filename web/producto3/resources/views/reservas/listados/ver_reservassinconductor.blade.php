@extends('layouts.plantilla')
@section('title', 'Reservas del Hotel all Aeropuerto')

@section('content')

<div class="container-fluid">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Localizador</th>
                <th>Tipo reserva</th>
                <th>Usuario</th>
                <th>Fecha reserva</th>
                <th>Fecha Entrada</th>
                <th>Hora Entrada</th>
                <th>Hotel</th>
                <th>Fecha Salida</th>
                <th>Hora Salida</th>
                <th>Asignar<br>Conductor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $info)
            <tr>
                <td>{{ $info["localizador"] }}</td>
                <td>{{ $info["Descripción"] }}</td>
                <td>{{ $info["email_cliente"] }}</td>
                <td>{{ $info["fecha_reserva"] }}</td>
                <td>{{ $info["fecha_entrada"] }}</td>
                <td>{{ $info["hora_entrada"] }}</td>
                <td>{{ $info["NombreHotel"] }}</td>
                <td>{{ $info["fecha_vuelo_salida"] }}</td>
                <td>{{ $info["hora_vuelo_salida"] }}</td>
                <td>
                    <a href="#" class="asignarconductor" id="asigna_conductor" name="asigna_conductor" data="">Asignar conductor</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
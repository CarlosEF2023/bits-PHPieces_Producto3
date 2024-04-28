@extends('layouts.plantilla')
@section('title', 'Listado de todas las reservas de la semana')

@section('content')

<br>
<h1>Listado de todas las reservas realizadas para la semana {{ date ("W") }} </h1>
<br>
<div class="card">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Localizador</th>
                <th>Tipo reserva</th>
                <th>usuario</th>
                <th>Fecha reserva</th>
                <th>Hotel</th>
                <th>Fecha Entrada</th>
                <th>Hora Entada</th>
                <th>Hora Recogida</th>
                <th>Aeropuerto</th>
                <th>Fecha Salida</th>
                <th>Hora Salida</th>
                <th colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matrizresultado as $info)
            <tr>
                <td>{{ $info["localizador"] }}</td>
                <td>{{ $info["Descripción"] }}</td>
                <td>{{ $info["email_cliente"] }}</td>
                <td>{{ $info["fecha_reserva"] }}</td>
                @switch($info["id_tipo_reserva"])
                    @case("1")
                        <td>{{ $info["NombreHotel"] }}</td>
                        <td>{{ $info["fecha_entrada"] }}</td>
                        <td>{{ $info["hora_entrada"] }}</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        @break
                    @case("2")
                        <td>{{ $info["NombreHotel"] }}</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>{{ $info["hora_recogida_hotel"] }}</td>
                        <td>{{ $info["origen_vuelo_entrada"] }}</td>
                        <td>{{ $info["fecha_vuelo_salida"] }}</td>
                        <td>{{ $info["hora_vuelo_salida"] }}</td>
                        @break
                    @case("3")
                        <td>{{ $info["NombreHotel"] }}</td>
                        <td>{{ $info["fecha_entrada"] }}</td>
                        <td>{{ $info["hora_entrada"] }}</td>
                        <td>{{ $info["hora_recogida_hotel"] }}</td>
                        <td>{{ $info["origen_vuelo_entrada"] }}</td>
                        <td>{{ $info["fecha_vuelo_salida"] }}</td>
                        <td>{{ $info["hora_vuelo_salida"] }}</td>
                        @break
                @endswitch
                <td>
                    <a href="#" class="btn btn-outline-success ver_reserva" id="ver_reserva" name="ver_reserva" data="{{ $info["id_reserva"] }}">
                        <img src="{{ asset('/assets/visibility_FILL0_wght400_GRAD0_opsz24.svg')}}">
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-outline-primary modificar_reserva" id="modificar_reserva" name="modificar_reserva" data="{{ $info["id_reserva"] }}">
                        <img src="{{ asset('/assets/edit_FILL0_wght400_GRAD0_opsz24.svg')}}'">
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-outline-danger eliminar_reserva" id="eliminar_reserva" name="eliminar_reserva" data="{{ $info["id_reserva"] }}">
                        <img src="{{ asset('/assets/delete_FILL0_wght400_GRAD0_opsz24.svg')}}">
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
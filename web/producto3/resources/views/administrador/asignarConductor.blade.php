@extends('layouts.plantilla')
@section('title', 'Asignar Conductor')
@section('content')
    <div class="container" style="margin-bottom: 50px;">
        <div class="col">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="container-fluid mt-3" style="padding-top: 20px;">
                            <h2>Asignar conductor</h2>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Confirmar</th>
                                            <th>Id Vehículo</th>
                                            <th>Localizador</th>
                                            <th>Id Tipo Reserva</th>
                                            <th>Email Cliente</th>
                                            <th>Fecha Reserva</th>
                                            <th>Fecha Modificación</th>
                                            <th>Id Destino</th>
                                            <th>Fecha Entrada</th>
                                            <th>Hora Entrada</th>
                                            <th>Número Vuelo Entrada</th>
                                            <th>Origen Vuelo Entrada</th>
                                            <th>Hora Vuelo Salida</th>
                                            <th>Hora Recogida Hotel</th>
                                            <th>Fecha Vuelo Salida</th>
                                            <th>Número Viajeros</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transferReservas as $reserva)
                                            <tr>
                                                <td>
                                                    <button form="form-{{ $reserva->id_reserva }}" type="submit"
                                                        class="btn btn-outline-success" style="width: auto;"><i
                                                            class="bi-check-circle"></i></button>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Formulario para modificar -->
                                                        <form method="post" id="form-{{ $reserva->id_reserva }}"
                                                            action="{{ route('administrador.updateAsignarConductor', $reserva->id_reserva) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="id_vehiculo" id="id_vehiculo" class="form-select"
                                                                style="width: auto;">
                                                                @foreach ($vehiculos as $vehiculo)
                                                                    <option value="{{ $vehiculo->id_vehiculo }}"
                                                                        {{ $reserva->id_vehiculo == $vehiculo->id_vehiculo ? 'selected' : '' }}>
                                                                        {{ $vehiculo->id_vehiculo }} -
                                                                        {{ $vehiculo->Descripcion }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>{{ $reserva->localizador }}</td>
                                                <td>{{ $reserva->id_tipo_reserva }}</td>
                                                <td style="width: auto; white-space: nowrap;">{{ $reserva->email_cliente }}
                                                </td>
                                                <td style="width: auto; white-space: nowrap;">{{ $reserva->fecha_reserva }}
                                                </td>
                                                <td style="width: auto; white-space: nowrap;">
                                                    {{ $reserva->fecha_modificacion }}</td>
                                                <td>{{ $reserva->id_destino }}</td>
                                                <td style="width: auto; white-space: nowrap;">{{ $reserva->fecha_entrada }}
                                                </td>
                                                <td>{{ $reserva->hora_entrada }}</td>
                                                <td>{{ $reserva->numero_vuelo_entrada }}</td>
                                                <td>{{ $reserva->origen_vuelo_entrada }}</td>
                                                <td>{{ $reserva->hora_vuelo_salida }}</td>
                                                <td>{{ $reserva->hora_recogida_hotel }}</td>
                                                <td style="width: auto; white-space: nowrap;">
                                                    {{ $reserva->fecha_vuelo_salida }}</td>
                                                <td>{{ $reserva->num_viajeros }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display:flexbox; align-items: center; padding: 20px;">

                            <a type="button" href="{{ route('administrador') }}" class="btn btn-outline-primary"
                                style="width: auto; margin-right: 10px;"><i class="bi-backspace"></i></i>Volver</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        // Función para confirmar la eliminación de una reserva
        function confirmarEliminacion() {
            return confirm("¿Está seguro que desea eliminar la reserva?");
        }
    </script>
@endsection

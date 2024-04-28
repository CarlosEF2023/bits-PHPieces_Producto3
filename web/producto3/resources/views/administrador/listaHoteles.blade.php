@extends('layouts.plantilla')
@section('title', 'Hotel')
{{-- poner menu como plantilla --}}
@section('content')
    <div class="container" style="margin-bottom: 50px;">
        {{-- <!-- Muestra el mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Muestra el mensaje de error -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif --}}
        <div class="col">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="container-fluid mt-3" style="padding-top: 20px;">
                            <h2>Listado de usuarios de hotel</h2>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre de hotel</th>
                                            <th>Características</th>
                                            <th>Zona</th>
                                            <th>Comisión</th>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- recorrer listado de administradores --}}
                                        @foreach ($hoteles as $hotel)
                                            <tr>
                                                <td>{{ $hotel->NombreHotel }}</td>
                                                <td>{{ $hotel->Caracteristicas }}</td>
                                                <td>{{ $hotel->id_zona }}</td>
                                                <td>{{ $hotel->Comision }}</td>
                                                <td>{{ $hotel->usuario }}</td>
                                                <td>{{ $hotel->email }}</td>

                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Formulario para modificar -->
                                                        <form method="post"                                                        
                                                            action="{{ route('administrador.frmModificarHotel') }}">
                                                            @csrf
                                                            <input type="hidden" name="hotelMod"
                                                                value="{{ $hotel->email }}">
                                                            <button type="submit" class="btn btn-outline-success"
                                                                style="width: auto;"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </form>

                                                        <!-- Formulario para eliminar -->
                                                        <form method="post" onsubmit="return confirmarEliminacion()"                                                        
                                                            action="{{ route('administrador.deleteHotel', $hotel->id_hotel) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                style="width: auto;"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; padding: 20px;">
                            <a type="button" href=" {{ route('administrador.frmNuevoHotel') }}"
                                class="btn btn-outline-primary" name="nuevoAdmin" id="nuevoAdmin"
                                style="width: auto; margin-right: 10px;"><i class="bi bi-plus-circle"></i> Añadir usuario hotel</a>
                                
                                <a id="volver-a-tipos" href="{{ route('administrador.tiposUsuarios') }}"
                                class="btn btn-outline-secondary" style="width: auto;"><i class="bi bi-arrow-left-circle"></i> Volver a Tipos de Usuarios</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        // Función para confirmar la eliminación de un viajero
        function confirmarEliminacion() {
            return confirm("¿Está seguro que desea eliminar el usuario de hotel?");
        }
    </script>
@endsection

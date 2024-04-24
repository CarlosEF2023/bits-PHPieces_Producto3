@extends('layouts.plantilla')
@section('title', 'Vehículo')
{{-- poner menu como plantilla --}}


@section('content')
<div class="container" style="margin-bottom: 50px;">
    <!-- Muestra el mensaje de éxito -->
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
    @endif
    <div class="col">
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="container-fluid mt-3" style="padding-top: 20px;">
                        <h2>Listado de administradores</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>1er Apellido</th>
                                        <th>2do Apellido</th>
                                        <th>Dirección</th>
                                        <th>Codigo postal</th>
                                        <th>Ciudad</th>
                                        <th>Pais</th>
                                        <th>email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- recorrer listado de viajeros --}}
                                    @foreach ($viajeros as $viajero)
                                        <tr>
                                            <td>{{ $viajero->nombre }}</td>
                                            <td>{{ $viajero->apellido1 }}</td>
                                            <td>{{ $viajero->Apellido2 }}</td>
                                            <td>{{ $viajero->direccion }}</td>
                                            <td>{{ $viajero->codigoPostal }}</td>
                                            <td>{{ $viajero->ciudad }}</td>
                                            <td>{{ $viajero->pais }}</td>
                                            <td>{{ $viajero->email }}</td>

                                            <td>
                                                <div class="d-flex justify-content-start gap-2">
                                                    <!-- Formulario para modificar -->
                                                    <form method="post"
                                                    {{-- {{ route('administrador.frmModificarAdmin') }} --}}
                                                        action="">
                                                        @csrf
                                                        <input type="hidden" name="viajeroMod"
                                                            value="{{ $viajero->id_viajero }}">
                                                        <button type="submit" class="btn btn-outline-success"
                                                            style="width: auto;"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </form>

                                                    <!-- Formulario para eliminar -->
                                                    <form method="post"
                                                        action="{{ route('administrador.delete', $viajero->id_viajero) }}">
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
                        {{-- {{ route('administrador.formNuevoAdministrador') }} --}}
                        <a type="button" href=""
                            class="btn btn-outline-primary" name="nuevoViajero" id="nuevoViajero"
                            style="width: auto; margin-right: 10px;"><i class="bi bi-plus-circle"></i> Añadir Viajero</a>
                        <a id="volver-a-tipos" href="{{ route('administrador.tiposUsuarios') }}"
                            class="btn btn-outline-secondary" style="width: auto;"><i class="bi bi-arrow-left-circle"></i> Volver a Tipos de Usuarios</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection
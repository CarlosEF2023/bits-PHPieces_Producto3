@extends('layouts.plantilla')
@section('title', 'Administrador')
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
                        <div class="container-fluid mt-2" style="padding-top: 20px;">
                            <h2>Listado de vehículos</h2>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Email</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- recorrer listado de vehículos --}}
                                        @foreach ($vehiculos as $vehiculo)
                                            <tr>
                                                <td>{{ $vehiculo->Descripcion }}</td>
                                                <td>{{ $vehiculo->email_conductor }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Formulario para modificar -->
                                                        <form method="post"
                                                        {{-- {{ route('administrador.frmModificarAdmin') }} --}}
                                                            action="">
                                                            @csrf
                                                            <input type="hidden" name="vehiculoMod"
                                                                value="{{ $vehiculo->id_vehiculo }}">
                                                            <button type="submit" class="btn btn-outline-success"
                                                                style="width: auto;"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </form>
                                                        <!-- Formulario para eliminar -->
                                                        <form method="post"
                                                        {{-- {{ route('administrador.delete', $admin->Id_usuario) }} --}}
                                                            action="">
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
                           
                            <a type="button" href=" {{ route('administrador.frmNuevoVehiculo') }}"
                                class="btn btn-outline-primary" name="nuevoVehiculo" id="nuevoVehiculo"
                                style="width: auto; margin-right: 10px;"><i class="bi bi-plus-circle"></i> Añadir Vehículo</a>
                            <a id="volver-a-tipos" href="{{ route('administrador.tiposUsuarios') }}"
                                class="btn btn-outline-secondary" style="width: auto;"><i class="bi bi-arrow-left-circle"></i> Volver a Tipos de Usuarios</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection

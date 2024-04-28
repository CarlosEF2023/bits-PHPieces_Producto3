@extends('layouts.plantilla')
@section('title', 'Trayectos')
{{-- poner menu como plantilla --}}
@section('content')
    <div class="container" style="margin-bottom: 50px;">
        <div class="col" style="width: 60%; margin: 20px auto 0; padding: 30px;">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="container-fluid mt-2" style="padding-top: 20px;">
                            <h2>Listado de trayectos</h2>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- recorrer listado de trayectos --}}
                                        @foreach ($trayectos as $trayecto)
                                            <tr>
                                                <td>{{ $trayecto->Descripcion }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Formulario para modificar -->                                                                                                        
                                                        <form method="post"  action=" {{ route('administrador.frmModificarTrayecto') }} ">
                                                            @csrf
                                                            <input type="hidden" name="trayectoMod"
                                                                value="{{ $trayecto->id_tipo_reserva }}">
                                                            <button type="submit" class="btn btn-outline-success"
                                                                style="width: auto;"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display:flexbox; align-items: center; padding: 20px;">                            
                            <a type="button" href="{{ route('administrador.frmNuevoTrayecto') }}" class="btn btn-outline-primary" name="nuevoTrayecto"
                                id="nuevoTrayecto" style="width: auto; margin-right: 10px;"><i
                                    class="bi bi-plus-circle"></i> Añadir trayecto</a>
                            <a id="volver-a-tipos" href="{{ route('administrador') }}" class="btn btn-outline-secondary"
                                style="width: auto;"><i class="bi bi-arrow-left-circle"></i> Volver al panel principal</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        // Función para confirmar la eliminación de un viajero
        function confirmarModificacion() {
            return confirm("¿Está seguro que desea modificar la descripción del trayecto?");
        }
    </script>
@endsection

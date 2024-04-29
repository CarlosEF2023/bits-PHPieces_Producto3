@extends('layouts.plantilla')
@section('title', 'Zonas')
{{-- poner menu como plantilla --}}
@section('content')
    <div class="container" style="margin-bottom: 50px;">
        <div class="col" style="width: 60%; margin: 20px auto 0; padding: 30px;">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="container-fluid mt-2" style="padding-top: 20px;">
                            <h2>Listado de zonas</h2>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- recorrer listado de zonas --}}
                                        @foreach ($zonas as $zona)
                                            <tr>
                                                <td>{{ $zona->descripcion }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Formulario para modificar -->   
                                                                                                                                                           
                                                        <form method="post"  action="{{ route('administrador.frmModificarZona') }}">
                                                            @csrf
                                                            <input type="hidden" name="zonaMod"
                                                                value="{{ $zona->id_zona }}">
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
                            <a type="button" href="{{ route('administrador.frmNuevaZona') }} " class="btn btn-outline-primary" name="nuevaZona"
                                id="nuevaZona" style="width: auto; margin-right: 10px;"><i
                                    class="bi bi-plus-circle"></i> Añadir Zona</a>
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
            return confirm("¿Está seguro que desea modificar la zona?");
        }
    </script>
@endsection

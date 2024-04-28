@extends('layouts.plantilla')
@section('title', 'Administrador')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Modificar Vehículo</h2>            
        <form method="POST" action="{{route('administrador.updateHotel', $hotel->id_hotel)}}     ">
        @csrf   
        @method('PUT')          
           
            <div class="mb-3">
                <label for="Caracteristicas" class="form-label" style="font-weight: bold;">Características</label>
                <textarea class="form-control" id="Caracteristicas" rows="4" placeholder="Características del hotel"
                    name="Caracteristicas" required>{{$hotel->Caracteristicas}}</textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="NombreHotel" class="form-label" style="font-weight: bold;">Nombre Hotel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-house-fill"></i></span>
                            <input type="text" class="form-control" id="NombreHotel"
                                placeholder="Escriba el nombre de hotel" name="NombreHotel" value="{{$hotel->NombreHotel}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="id_zona" class="form-label" style="font-weight: bold;">Zona</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-pin-map"></i></span>
                            <input type="text" class="form-control" id="id_zona" placeholder="Zona" name="id_zona"
                            value="{{$hotel->id_zona}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="usuario" class="form-label" style="font-weight: bold;">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="usuario"
                                placeholder="Escriba su nombre de usuario" name="usuario" value="{{$hotel->usuario}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="Comision" class="form-label" style="font-weight: bold;">Comisión</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-percent"></i></i></span>
                            <input type="text" class="form-control" id="Comision" placeholder="Comisión"
                                name="Comision" value="{{$hotel->Comision}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="Escriba su Email"
                                name="email" value="{{$hotel->email}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Escriba su Password"
                                name="password" value="{{$hotel->password}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-outline-primary" style="width: auto;">Actualizar</button>
                <a type="button" href="{{ route('administrador.listaHoteles') }}" class="btn btn-outline-secondary"
                    style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
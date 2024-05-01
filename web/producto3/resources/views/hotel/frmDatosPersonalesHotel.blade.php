@extends('layouts.plantilla')
@section('title', 'Datos personales')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Modificar Datos Hotel {{ $hotel->NombreHotel }}</h2>
       <br><hr><br>
       <form method="POST" action="{{ route('hotel.updateHotel', Session::get('id')) }}">
        @csrf
        @method('PUT')
            <input type="hidden" id="id_hotel" name="id_hotel" value="{{$hotel->id_hotel}}">
            <input type="hidden" id="Id_tipo_usuario" name="Id_tipo_usuario" value="{{$hotel->Id_tipo_usuario}}">           

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="NombreHotel" class="form-label" style="font-weight: bold;">Nombre Hotel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="NombreHotel" placeholder="Enter Username" name="NombreHotel" value="{{$hotel->NombreHotel}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="Caracteristicas" class="form-label" style="font-weight: bold;">Características</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <textarea class="form-control" id="Caracteristicas" name="Caracteristicas">{{$hotel->Caracteristicas}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="zona" class="form-label" style="font-weight: bold;">Zona</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <x-zona-select :selected="$hotel->id_zona" name="id_zona" /> 
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="Comision" class="form-label" style="font-weight: bold;">Comision</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="number" class="form-control" id="Comision" placeholder="En €" name="Comision" value="{{$hotel->Comision}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="usuario" class="form-label" style="font-weight: bold;">usuario</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="text" class="form-control" id="usuario" placeholder="Enter Email" name="usuario" value="{{$hotel->usuario}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: bold;">email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$hotel->email}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{$hotel->password}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" name="edit" class="btn btn-outline-primary" style="width: auto;">Actualizar</button>
                <a type="button"href="{{ back()->getTargetUrl() }}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection
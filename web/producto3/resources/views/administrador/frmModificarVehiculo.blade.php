@extends('layouts.plantilla')
@section('title', 'Administrador')
 {{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Modificar Vehículo</h2>        
        <form method="POST" action="{{route('administrador.updateVehiculo', $vehiculo->id_vehiculo)}} ">
        @csrf   
        @method('PUT') 
            <input type="hidden" id="id_vehiculo" name="id_vehiculo" value="{{$vehiculo->id_vehiculo}}">
            <input type="hidden" id="Id_tipo_usuario" name="Id_tipo_usuario" value="{{$vehiculo->Id_tipo_usuario}}">           

            <div class="mb-3">
                <label for="descripcion" class="form-label" style="font-weight: bold;">Descripción</label>
                <input type="text" class="form-control" id="descripcion" placeholder="Escriba su descripción" name="descripcion" value="{{$vehiculo->Descripcion}}" required>
            </div>
            <div class="mb-3">
                <label for="email_conductor" class="form-label" style="font-weight: bold;">Email</label>
                <input type="text" class="form-control" id="email_conductor" placeholder="Escriba su Email" name="email_conductor" value="{{$vehiculo->email_conductor}}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Escriba su Password" name="password" value="{{$vehiculo->password}}" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" name="edit" class="btn btn-outline-primary" style="width: auto;">Actualizar</button>
                <a type="button" href="{{route('administrador.listaVehiculos')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
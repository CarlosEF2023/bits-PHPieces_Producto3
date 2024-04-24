@extends('layouts.plantilla')
@section('title', 'Administrador')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 50%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Añadir Vehículo</h2>
        {{-- {{route('administrador.store')}} --}}
        <form method="POST" action="">
            @csrf
            <input type="hidden" id="tipoUsuario" name="tipoUsuario" value="4">

            <div class="mb-3">
                <label for="descripcion" class="form-label" style="font-weight: bold;">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="4" placeholder="Descripción del vehículo" name="descripcion" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Escriba su Email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Escriba su Password" name="password" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-outline-primary" style="width: auto;">Enviar</button>
                <a type="button" href="{{route('administrador.listaVehiculos')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

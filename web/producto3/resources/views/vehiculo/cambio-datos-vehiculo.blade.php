@extends('layouts.plantilla')
@section('title', 'cambioDatosVehiculo')

@section('content')
<div class="bg-light container-sm mt-5 shadow p-3 rounded bg-primary text-white">
   
    <h1 class="text-center text-dark">Datos del vehiculo</h1>

    

    <form class="formulario mt-4" method="POST" action="cambiar-datos">
    @csrf 
    @include('vehiculo.alertas') 
       <div class="campo">
            <label for="descripcion" class="form-label text-dark">Descripcion del vehiculo</label>
            <input
                type="descripcion"
                class="form-control"
                value="<?php echo $user->Descripcion ?>"
                name="descripcion"
                placeholder="Tu descripcion"
            />    
        </div>

        <div class="campo">
            <label for="email_conductor" class="form-label text-dark">Email del conductor</label>
            <input
                type="email_conductor"
                class="form-control"
                value="<?php echo $user->email_conductor ?>"
                name="email_conductor"
                placeholder="Tu email"
            />    
        </div>

        <button type="submit" class="btn btn-primary w-100 p-4 mt-3 fs-5 mb-4 fw-bold" >Guardar Cambios</button>

        <a href="cambiar-contraseña" class="text-dark fw-bold">Cambiar Contraseña</a>
        
    </form>
    
</div>
@endsection
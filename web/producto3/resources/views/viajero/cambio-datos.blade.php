
@extends('layouts.plantilla')
@section('title', 'cambioDatosViajero')


@section('content')
<div class="bg-light container-sm mt-5 shadow p-3 rounded bg-primary text-white">

    <h1 class="text-center text-dark">Tus datos <?php echo $user->nombre ?></h1>

    

    <form class="formulario mt-4" method="POST" action="cambiar-datos">
    @csrf <!-- Agregar el campo CSRF token -->
    @include('viajero.alertas') 
       
       <div class="campo">
            <label for="nombre" class="form-label text-dark">Nombre</label>
            <input
                type="nombre"
                class="form-control"
                value="<?php echo $user->nombre ?>"
                name="nombre"
                placeholder="Tu nombre"
            />    
        </div>

        <div class="campo mt-2">
            <label for="email" class="form-label text-dark">Email</label>
            <input
                type="email"
                class="form-control"
                value=" {{ $user->email }}"
                name="email"
                placeholder="Tu email"
            />    
        </div>

        <button type="submit" class="btn btn-primary w-100 p-4 mt-3 fs-5 mb-4 fw-bold" >Guardar Cambios</button>

        <a href="cambiar-contraseña" class="text-dark fw-bold">Cambiar Contraseña</a>
        
    </form>
    
</div>
@endsection
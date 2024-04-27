@extends('layouts.plantilla')
@section('title', 'cambioContraseñaViajero')


@section('content')

<div class="bg-light container-sm mt-5 shadow p-3 rounded bg-primary text-white">
    
    <h1 class="text-center text-dark">Cambio de contraseña de <?php echo $user->nombre ?></h1>

    

    <form class="formulario mt-4" method="POST" action="cambiar-contraseña">
    @csrf <!-- Agregar el campo CSRF token -->
    @include('viajero.alertas') 
       
    <div class="campo">
            <label for="contraseña_antigua" class="form-label text-dark">Contraseña antigua</label>
            <input
                type="contraseña_antigua"
                class="form-control"
                name="contraseña_antigua"
                placeholder="Tu contraseña antigua"
                
            />    
        </div>

        <div class="campo">
            <label for="contraseña_nueva" class="form-label text-dark">Contraseña nueva </label>
            <input
                type="contraseña_nueva"
                class="form-control"
                name="contraseña_nueva"
                placeholder="Tu contraseña nueva"
            />    
        </div>

        <button type="submit" class="btn btn-primary w-100 p-4 mt-3 fs-5 mb-4 fw-bold" >Guardar Cambios</button>

        <a href="cambiar-datos" class="text-dark fw-bold">Volver a perfil</a>
        
    </form>
    
</div>

@endsection
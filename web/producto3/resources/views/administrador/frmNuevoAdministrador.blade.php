@extends('layouts.plantilla')
@section('title', 'Administrador')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Añadir Administrador</h2>
        <form method="POST" action="{{route('administrador.store')}}">
            @csrf
            <input type="hidden" id="tipoUsuario" name="tipoUsuario" value="3">

            <div class="mb-3">
                <label for="username" class="form-label" style="font-weight: bold;">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Escriba su Username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label" style="font-weight: bold;">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Escriba su Nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="primerApellido" class="form-label" style="font-weight: bold;">1er Apellido</label>
                <input type="text" class="form-control" id="primerApellido" placeholder="Escriba su 1er Apellido" name="primerApellido" required>
            </div>
            <div class="mb-3">
                <label for="segundoApellido" class="form-label" style="font-weight: bold;">2do Apellido</label>
                <input type="text" class="form-control" id="segundoApellido" placeholder="Escriba su 2do Apellido" name="segundoApellido" required>
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
                <a type="button" href="{{route('administrador.listaAdministradores')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.plantilla')
@section('title', 'Administrador')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 50%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Añadir Viajero</h2>   
           
        <form method="POST" action="{{route('administrador.storeViajero')}}  ">
            @csrf
            <input type="hidden" id="tipoUsuario" name="tipoUsuario" value="6">
            <div class="mb-3">
                <label for="nombre" class="form-label" style="font-weight: bold;">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="nombre" placeholder="Escriba su Nombre" name="nombre" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="apellido1" class="form-label" style="font-weight: bold;">1er Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="apellido1" placeholder="Escriba su primer apellido" name="apellido1" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="apellido2" class="form-label" style="font-weight: bold;">2do Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="apellido2" placeholder="Escriba su segundo apellido" name="apellido2" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label" style="font-weight: bold;">Dirección</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                    <input type="text" class="form-control" id="direccion" placeholder="Escriba su dirección" name="direccion" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="codigoPostal" class="form-label" style="font-weight: bold;">Código postal</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="codigoPostal" placeholder="Escriba su código postal" name="codigoPostal" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="ciudad" class="form-label" style="font-weight: bold;">Ciudad</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="ciudad" placeholder="Escriba su ciudad" name="ciudad" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="pais" class="form-label" style="font-weight: bold;">País</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="pais" placeholder="Escriba su país" name="pais" required>
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
                            <input type="email" class="form-control" id="email" placeholder="Escriba su email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Escriba su Password" name="password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-outline-primary" style="width: auto;">Enviar</button>
                <a type="button" href="{{route('administrador.listaViajeros')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
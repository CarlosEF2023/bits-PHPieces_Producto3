@extends('layouts.plantilla')
@section('title', 'Datos personales')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Modificar Datos personales</h2>
       
        <form method="POST" action=" {{route('administrador.update', $administrador->Id_usuario)}}">
        @csrf  
        @method('PUT') 
            <input type="hidden" id="Id_usuario" name="Id_usuario" value="{{$administrador->Id_usuario}}">
            <input type="hidden" id="Id_tipo_usuario" name="Id_tipo_usuario" value="{{$administrador->Id_tipo_usuario}}">           

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="username" class="form-label" style="font-weight: bold;">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{$administrador->Username}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style="font-weight: bold;">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="nombre" placeholder="Enter Nombre" name="nombre" value="{{$administrador->Nombre}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="primerApellido" class="form-label" style="font-weight: bold;">1er Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="primerApellido" placeholder="Enter 1er Apellido" name="primerApellido" value="{{$administrador->Apellido1}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="segundoApellido" class="form-label" style="font-weight: bold;">2do Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="segundoApellido" placeholder="Enter 2do Apellido" name="segundoApellido" value="{{$administrador->Apellido2}}" required>
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
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$administrador->email}}" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{$administrador->Password}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" name="edit" class="btn btn-outline-primary" style="width: auto;">Actualizar</button>
                <a type="button"href="{{ request()->method() === 'GET' ? url()->previous() : url('administrador') }}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.plantilla')
@section('title', 'Nuevo trayecto')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 50%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Añadir trayecto</h2>
        <form method="POST" action="{{route('administrador.storeTrayecto')}}">
            @csrf           

            <div class="mb-3">
                <label for="descripcion" class="form-label" style="font-weight: bold;">Descripción</label>
                <input type="text" class="form-control" id="descripcion"  placeholder="Descripción del trayecto" name="descripcion" required></input>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-outline-primary" style="width: auto;">Enviar</button>
                <a type="button" href="{{route('administrador.listaTrayectos')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
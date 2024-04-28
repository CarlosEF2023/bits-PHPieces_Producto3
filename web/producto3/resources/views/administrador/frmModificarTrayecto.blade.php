@extends('layouts.plantilla')
@section('title', 'Modificar trayecto')
{{-- poner menu como plantilla --}}
@section('content')
<div class="card" style="width: 60%; margin: 20px auto 0; padding: 30px;">
    <div class="card-body">
        <h2 class="text-center">Modificar Trayecto</h2>
         
        <form method="POST" action="{{route('administrador.updateTrayecto', $trayecto->id_tipo_reserva)}}">
        @csrf   
        @method('PUT') 
            <input type="hidden" id="id_tipo_reserva" name="id_tipo_reserva" value="{{$trayecto->id_tipo_reserva}}">           

            <div class="mb-3">
                <label for="descripcion" class="form-label" style="font-weight: bold;">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="4" placeholder="Escriba su descripción" name="descripcion" required>{{$trayecto->Descripcion}}</textarea>
            </div>            
            <div class="mb-3 text-center">
                <button type="submit" name="edit" class="btn btn-outline-primary" style="width: auto;">Actualizar</button>
                <a type="button" href="{{route('administrador.listaTrayectos')}}" class="btn btn-outline-secondary" style="width: auto;" id="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
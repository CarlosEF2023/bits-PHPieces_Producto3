@extends('layouts.plantilla')
@section('title', 'Modificar zona')
{{-- poner menu como plantilla --}}
@section('content')
    <div class="card" style="width: 50%; margin: 20px auto 0; padding: 30px;">
        <div class="card-body">
            <h2 class="text-center">Modificar Zona</h2>            
            <form method="POST" action="{{route('administrador.updateZona', $zona->id_zona)}}">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_zona" name="id_zona" value="{{ $zona->id_zona }}">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi-journal-text"></i></span>
                        <input type="text" class="form-control" id="descripcion" placeholder="Descripción de la zona"
                            name="descripcion" value="{{ $zona->descripcion }}" required></input>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name="edit" class="btn btn-outline-primary"
                        style="width: auto;">Actualizar</button>
                    <a type="button" href="{{ route('administrador.listaZonas') }}" class="btn btn-outline-secondary"
                        style="width: auto;" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.plantilla')
@section('title', 'Nueva zona')
{{-- poner menu como plantilla --}}
@section('content')
    <div class="card" style="width: 50%; margin: 20px auto 0; padding: 30px;">
        <div class="card-body">
            <h2 class="text-center">Añadir zona</h2>

            <form method="POST" action="{{ route('administrador.storeZona') }}">
                @csrf

                <div class="mb-3">
                    <label for="descripcion" class="form-label" style="font-weight: bold;">Descripción</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi-journal-text"></i></span>
                        <input type="text" class="form-control" id="descripcion" placeholder="Descripción de la zona"
                            name="descripcion" required></input>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-outline-primary" style="width: auto;">Aceptar</button>
                    <a type="button" href="{{ route('administrador.listaZonas') }}" class="btn btn-outline-secondary"
                        style="width: auto;" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('plantilla')

@section('contenido')
<div class="d-flex align-items-center justify-content-center" name="reservas" id="reservas">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas de Hoy</h5>
                        <p class="card-text">Revisa las reservas que tienes para hoy</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        <a href="#" class="btn btn-primary" name="reservasdia" id="reservasdia">Ver reservas del día</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas de la semana</h5>
                        <p class="card-text">Revisa tu planificación semanal</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="reservassemana" id="reservassemana" class="btn btn-primary">Ver reservas de la semana</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reservas del mes</h5>
                        <p class="card-text">Revisa tu planificación mensual</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="reservasmes" id="reservasmes" class="btn btn-primary">Ver reservas del mes</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Historico de reservas</h5>
                        <p class="card-text">Revisa todas las reservas realizadas</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="reservastotal" id="reservastotal" class="btn btn-primary">Ver todas</a>
                    </div>
                </div>
            </div>
           <!-- Agrega más columnas aquí según sea necesario -->
           </div>
    </div>
@endsection
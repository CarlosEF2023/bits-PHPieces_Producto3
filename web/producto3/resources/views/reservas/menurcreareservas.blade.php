@extends('plantilla')

@section('contenido')
<div class="d-flex align-items-center justify-content-center" name="reservas" id="reservas">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reserva viaje del Aeropuerto al Hotel</h5>
                        <p class="card-text">Reserva tu viaje del Aeropuerto al hotel y evita esperas.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                        <a href="#" class="btn btn-primary" name="agendar_aeropuerto_hotel" id="agendar_aeropuerto_hotel">¡Agendar!</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Reserva viaje del Hotel al Aeropuerto</h5>
                        <p class="card-text">Evita perder el avión y llega a tiempo al aeropuerto.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="agendar_hotel_aeropuerto" id="agendar_hotel_aeropuerto" class="btn btn-primary">¡Agendar!</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Servicio ida y vuelta</h5>
                        <p class="card-text">Sin complicaciones. Nosotros nos encargamos de llevarte siempre a tiempo.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="agendar_completo" id="agendar_completo" class="btn btn-primary">¡Agendar!</a>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 300px;">
                <div class="card h-100">
                    <img src="/~uocx1/assets/reservas.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ver reservas</h5>
                        <p class="card-text">Revisa las reservas que has realizado.</p>
                    </div>
                    <div class="card-footer align-items-center justify-content-center">
                    <a href="#" name="ver_reservas" id="ver_reservas" class="btn btn-primary">Ver todas las reservas</a>
                    </div>
                </div>
            </div>
           <!-- Agrega más columnas aquí según sea necesario -->
           </div>
    </div>
@endsection
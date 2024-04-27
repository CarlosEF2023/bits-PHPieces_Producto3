@extends('layouts.plantilla')
@section('title', 'Menú de listado de reservas')

@section("nav")
@include('layouts.menu_nav')
@endsection

@section('content')

<div class="container mt-4">
    <?php if ($reservas->isEmpty()) { ?>

        
            <p class="d-block fw-bold text-center text-dark">No hay Reservas Aún</p>
      
            <div class="d-flex justify-content-center">
            <a href="/producto3/public" class="btn btn-warning p-3 rounded w-25 text-center fw-bold text-light">Reserva un trayecto ahora!</a>
            </div>
        

    <?php } else { ?>    
        <div class="row">
            <?php foreach($reservas as $reserva) { ?>
                <div class="col-md-4">
                    <div class="card reserva">
                        <div class="card-body">
                            <h5 class="card-title">Reserva</h5>
                            <p class="card-text"><strong>Email Cliente:</strong> <?php echo $reserva['email_cliente']; ?></p>
                            <p class="card-text"><strong>ID Reserva:</strong> <?php echo $reserva['id_reserva']; ?></p>
                            <p class="card-text"><strong>Tipo de Reserva:</strong> <?php echo $reserva['id_tipo_reserva']; ?></p>
                            <p class="card-text"><strong>Fecha de Reserva:</strong> <?php echo $reserva['fecha_reserva']; ?></p>
                            <p class="card-text"><strong>ID Vehículo:</strong> <?php echo $reserva['id_vehiculo']; ?></p>
                            <p class="card-text"><strong>Número de Viajeros:</strong> <?php echo $reserva['num_viajeros']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

@endsection
@extends('layouts.plantilla')
@section('title', 'Home')

<header class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark shadow" style="position: sticky; top: 0;">
@section('navbar')
@if(isset($user))
    @include('layouts.menu_nav', ['user' => $user])
@else
    @include('layouts.menu_nav')
@endif
@endsection
</header>

@section('content')

    <div class="container-fluid" name="principal" id="principal">
        <main>
            <div class="container-fluid" name="principal" id="principal">

                <div class="hero-section">
                    <h1>Bienvenido a Isla Transfers</h1>
                    <p>En Isla Transfer, nos comprometemos a brindar un servicio excepcional, donde la puntualidad y la
                        satisfacción del cliente son nuestras principales prioridades.</p>
                    <p>Desde 2010, Sirviendo con Excelencia: Fundada en 2005, Isla Transfer ha crecido para convertirse en
                        uno
                        de los principales proveedores de transferencias de aeropuerto a hotel en nuestra región.</p>
                    <p>Comprometidos con la Puntualidad: En Isla Transfer, entendemos la importancia de llegar a tiempo.<br>
                        Además, Nuestros conductores profesionales garantizan tiempos de espera mínimos, para que pueda
                        llegar a
                        su destino de manera eficiente y sin demoras.</p>
                </div>

                <div id="reserva" class="reserva-section">
                    <h2>Reserva tu transfer</h2>
                    <p>¿Listo para reservar su traslado con Isla Transfer?<br>¡Contáctenos hoy mismo para obtener más
                        información!</p>
                    <a href="/views/reservas/frm_reservas.php" class="btn btn-primary">¡Reserve su Transferencia
                        Hoy!</a><br>
                    <p>También disponibles al teléfono: +34 123 456 89<br>
                    <p>Contacta con nuestro servicio de atención a ciente al mail: info@islatransfer.com</p>
                </div>

                <div class="about-section">
                    <h2>Sobre nosotros</h2>
                    <p>Isla Transfers es la empresa líder en traslados de viajeros en la isla. Con una amplia flota de
                        vehículos
                        y un equipo de conductores profesionales, garantizamos un servicio seguro y confiable para nuestros
                        clientes.</p>
                    <p>¡Gracias por considerar Isla Transfer para sus necesidades de transferencia aeropuerto-hotel!
                        Esperamos
                        tener el placer de servirle pronto.</p>
                </div>

                <div class="clientes-section">
                    <h2>Testimonios y Experiencias de Clientes:</h2>
                    <p>Estamos orgullosos de ofrecer experiencias de viaje memorables a nuestros clientes.</p>
                    <div class="d-flex justify-content-center" style="margin-top: 50px;">
                        <div class="card mx-auto card-index" style="width: 400px;">
                            <img class="card-img-top" src="./assets/gente1.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Felix & familia</h4>
                                <p class="card-text">-¡Increíble servicio! Llegaron justo a tiempo y el conductor fue muy
                                    amable
                                    y servicial.</p>
                            </div>
                        </div>
                        <div class="card mx-auto card-index" style="width: 400px;">
                            <img class="card-img-top" src="./assets/gente2.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Carlos</h4>
                                <p class="card-text">-Volveré a contratar sus servicios, sin duda.</p>
                            </div>
                        </div>
                        <div class="card mx-auto card-index" style="width: 400px;">
                            <img class="card-img-top" src="./assets/gente3.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Esther</h4>
                                <p class="card-text">-Un trato profesional y exquisito.</p>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
    </div>
@endsection
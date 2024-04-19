@extends('layouts.plantilla')
@section('title', 'Home')

@section('content')
    <?php
    // Comprueba si la sesión ya está iniciada
    if (session_status() !== PHP_SESSION_ACTIVE) {
        error_reporting(0);
        session_start();
    }
    ?>

    <?php
if (!isset($_SESSION['login']) || $_SESSION['login'] == "") {
?>

    <header class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark shadow" style="position: sticky; top: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <a href='/index.php'><img src={{ asset('assets/Isla_Transfers_Logo.jpeg') }} width='64px'></a>
                        height='64px'></span></a>";
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content">
                    <div class="hamburger-toggle">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbar-content">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./views/principal.php">Isla Transfer</a>
                        </li>
                    </ul>
                </div>
                <div>

                    <!-- Colapsar correctamente los form de login -->

                    <form action="controllers/loggin_sql.php" method="post" style="display: flex; align-items: center;">
                        <div style=" margin-right: 10px;">
                            <a href="#" class="enlace">Registrarse</a>
                        </div>
                        <div style=" margin-right: 10px;">
                            <label for="email">@</label>
                            <input type="email" id="emailId" name="email" placeholder="email" required>
                        </div style=" margin-right: 10px;">
                        <div>
                            <label for="password"></label>
                            <input type="password" id="passwordId" name="password" placeholder="password" required>
                        </div style=" margin-right: 10px;">
                        <div style=" margin-left: 10px;">
                            <input type="submit" value="Login" class="btn btn-secondary btn-sm">
                        </div>
                    </form>
                </div>


            </a>

            </nav>
        </div>
    </header>

    <?php
} else {
    include "views/menu.php";
    /*
                    <form action="controllers/CerrarAplicacion.php" method="post" style="display: flex; align-items: center;">
                        <div style=" margin-right: 10px;">
                            <!--  TODO aqui un icono de usuario -->
                        </div>
                        <div style=" margin-right: 10px;">
                            <label name="email"><?= $_SESSION['email']; ?></label>
    </div style=" margin-right: 10px;">
    <div style=" margin-left: 10px;">
        <input type="submit" value="Salir" class="btn btn-secondary btn-sm">
    </div>
    </form>
    */
    }
    ?>

    <main>
        <?php
        if (isset($_SESSION['user_fail'])) {
            echo '<div class="alert alert-danger">';
            echo '<strong>Login fail</strong> ' . $_SESSION['user_fail'];
            echo '</div>';
            unset($_SESSION['user_fail']); // Eliminar la variable de sesión
        }
        ?>
        <?php
        if (isset($_SESSION['user_pass_fail'])) {
            echo '<div class="alert alert-danger">';
            echo '<strong>Login fail</strong> ' . $_SESSION['user_pass_fail'];
            echo '</div>';
            unset($_SESSION['user_pass_fail']); // Eliminar la variable de sesión
        }
        ?>
        <div class="container-fluid" name="principal" id="principal">

            <div class="hero-section">
                <h1>Bienvenido a Isla Transfers</h1>
                <p>En Isla Transfer, nos comprometemos a brindar un servicio excepcional, donde la puntualidad y la
                    satisfacción del cliente son nuestras principales prioridades.</p>
                <p>Desde 2010, Sirviendo con Excelencia: Fundada en 2005, Isla Transfer ha crecido para convertirse en uno
                    de los principales proveedores de transferencias de aeropuerto a hotel en nuestra región.</p>
                <p>Comprometidos con la Puntualidad: En Isla Transfer, entendemos la importancia de llegar a tiempo.<br>
                    Además, Nuestros conductores profesionales garantizan tiempos de espera mínimos, para que pueda llegar a
                    su destino de manera eficiente y sin demoras.</p>
            </div>

            <div id="reserva" class="reserva-section">
                <h2>Reserva tu transfer</h2>
                <p>¿Listo para reservar su traslado con Isla Transfer?<br>¡Contáctenos hoy mismo para obtener más
                    información!</p>
                <a href="/views/reservas/frm_reservas.php" class="btn btn-primary">¡Reserve su Transferencia Hoy!</a><br>
                <p>También disponibles al teléfono: +34 123 456 89<br>
                <p>Contacta con nuestro servicio de atención a ciente al mail: info@islatransfer.com</p>
            </div>

            <div class="about-section">
                <h2>Sobre nosotros</h2>
                <p>Isla Transfers es la empresa líder en traslados de viajeros en la isla. Con una amplia flota de vehículos
                    y un equipo de conductores profesionales, garantizamos un servicio seguro y confiable para nuestros
                    clientes.</p>
                <p>¡Gracias por considerar Isla Transfer para sus necesidades de transferencia aeropuerto-hotel! Esperamos
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
                            <p class="card-text">-¡Increíble servicio! Llegaron justo a tiempo y el conductor fue muy amable
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

            <script>
                $("#datospersonales_administrador").on("click", function(e) {
                    e.preventDefault();
                    $("#principal").load("./views/frm_datos_personales_admin.php");
                });
            </script>
    </main>
@endsection

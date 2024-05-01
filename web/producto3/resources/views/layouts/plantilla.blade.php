<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/libraries/bootstrap.min.css') }}" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- No se encuentra --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style2.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
</head>
</head>

<body>

<nav class="navbar fixed-top sticky-top navbar-expand-lg navbar-light bg-dark navbar-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="d-inline-block align-top" src="{{ asset('assets/Isla_Transfers_Logo.jpeg') }}" width="64px" height="64px" alt="">
                <span class="ms-2 fs-2">Isla Transfer</span>         
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="hamburger-toggle">
                <div class="hamburger">
                    <span class="navbar-toggler-icon"></span>
                </div>
            </div>
        </button>

        @if (Session::get('loggin')=="on")
        <!-- Si existe el usuario -->
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Isla Transfer</a></li> -->
                <li class="nav-item"><a class="nav-link" href="#">Hola {{ Session::get('mail') }}!</a></li>

                @switch(Session::get('usertype'))

                    @case('3')
                        <!-- Administración -->
                        <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('administrador') }}">Dashboard</a></li>
                        <li class="nav-item dropdown me-md-2">
                            <a class="nav-link dropdown-toggle" href="#" id="admin_reservas_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reservas</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="admin_reservas_dropdown">
                                <li><a class="dropdown-item" href="{{ route('administrador.reservas.menu') }}">Crear reservas</a></li>
                                <li><a class="dropdown-item" href="{{ route('administrador.reservas.listar') }}">Gestión de reservas</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.asignarConductor')}}">Asignar conductor</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-md-2">
                            <a class="nav-link dropdown-toggle" href="#" id="admin_gestion_user_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gestión de usuarios</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="admin_gestion_user_dropdown">
                                <li><a class="dropdown-item" href="{{route('administrador.listaAdministradores')}}">Administradores</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.listaVehiculos')}}">Conductores / Vehículos</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.listaHoteles')}}">Hoteles</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.listaViajeros')}}">Viajeros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-md-2">
                            <a class="nav-link dropdown-toggle" href="#" id="admin_mantenimiento_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mantenimiento</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="admin_mantenimiento_dropdown">
                                <li><a class="dropdown-item" href="{{route('administrador.listaZonas')}}">Gestión de zonas</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.listaTrayectos')}}">Gestión de Tipos de reservas</a></li>
                                <li><a class="dropdown-item" href="{{route('administrador.tiposUsuarios')}}">Gestión de Tipos de usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('administrador.frmDatosPersonalesAdmin') }}">Datos personales</a></li>
                        @break

                    @case('4')
                    <!-- Conductor -->
                    <!-- Aquí colocar las opciones específicas para el conductor -->
                    <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('vehiculo.listar') }}">Ver itinerario</a></li>
                    <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('vehiculo.cambio-datos') }}">Datos personales</a></li>
                    @break

                    @case('5')
                    <!-- Hotel -->
                    <!-- Aquí colocar las opciones específicas para el hotel -->
                    <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('hotel.reservas.menu') }}">Crear Reservas</a></li>
                    <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('hotel.reservas.listar') }}">Listar Reservas</a></li>
                    <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('hotel.frmDatosPersonalesHotel') }}">Datos personales</a></li>

                    @break

                    @case('6')
                    <!-- Viajero -->
                    <!-- Aquí colocar las opciones específicas para el viajero -->
                        <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('viajero.reservas.menu') }}">Crear Reservas</a></li>
                        <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('viajero.reservas.listar') }}">Listar Reservas</a></li>
                        <li class="nav-item me-md-2"><a class="nav-link" href="{{ route('viajero.cambio-datos') }}">Datos personales</a></li>
                    @break

                @endswitch
            </ul>

            <div class="ms-auto me-md-2"> 
                <a href="{{ route('logout') }}" class="btn btn-danger">Salir</a>
            </div>
        </div>
        <!-- Fin de div collapse -->

        @else

        <!-- Si no existe el usuario -->
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./views/principal.php">Isla Transfer</a>
                </li>
            </ul>
        </div>

        <!-- Colapsar correctamente los form de login -->
        <div>
            <form action="{{ route('login') }}" method="post" style="display: flex; align-items: center;">
                @csrf
                <div style="margin-right: 10px;">
                    <a href="registrarse" class="enlace">Registrarse</a>
                </div>
                <div style="margin-right: 10px;">
                    <label for="email">@</label>
                    <input type="email" id="emailId" name="email" placeholder="email" required>
                </div>
                <div>
                    <label for="password"></label>
                    <input type="password" id="passwordId" name="password" placeholder="password" required>
                </div>
                <div style="margin-left: 10px;">
                    <input type="submit" value="Login" class="btn btn-secondary btn-sm">
                </div>
            </form>
        </div>
        @endif
    </nav>
    </div>
    <br>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session()->has('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @yield('content')

    <div class="footer" id="foot" name="foot">bits & PHPieces - Producto 2 - FP064 </div>
    <script lang="javascript" src="{{ asset('assets/libraries/jquery-3.7.1.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('assets/libraries/bootstrap.bundle.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('assets/libraries/popper.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('assets/libraries/wizard.js') }}"></script>



</body>

</html>

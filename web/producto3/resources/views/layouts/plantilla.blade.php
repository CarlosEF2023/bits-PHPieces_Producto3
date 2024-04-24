<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('./assets/libraries/bootstrap.min.css') }}" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/wizard.css') }}">
</head>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span><img src="{{ asset('assets/Isla_Transfers_Logo.jpeg') }}" width="64px" height="64px"></span>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="hamburger-toggle">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </button>

        @if ($user)
        <!-- Si existe el usuario -->
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Isla Transfer</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Hola {{ $user->email }}!</a></li>

                @switch($user->Id_tipo_usuario)

                    @case('3')
                        <!-- Administración -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('menu.crear') }}">Crear Reservas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('menu.listar') }}">Listar Reservas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('menu.datos_personales') }}">Datos personales</a></li>
                        @break

                    @case('4')
                    <!-- Conductor -->
                    <!-- Aquí colocar las opciones específicas para el conductor -->
                    @break

                    @case('5')
                    <!-- Hotel -->
                    <!-- Aquí colocar las opciones específicas para el hotel -->
                    @break

                    @case('6')
                    <!-- Viajero -->
                    <!-- Aquí colocar las opciones específicas para el viajero -->
                    @break

                @endswitch

            </ul>

            <a class="nav-link" style="align:right;" href="#" id="cerraraplicacion" name="cerraraplicacion">Salir</a>

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
                    <a href="#" class="enlace">Registrarse</a>
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
        </nav>
        </div>
        @endif
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

    <div class="container-fluid" id="principal" name="principal">
    @yield('content')    
    </div>
    <div class="footer" id="foot" name="foot">bits & PHPieces - Producto 2 - FP064 </div>
    <script lang="javascript" src="{{ asset('./assets/libraries/jquery-3.7.1.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('./assets/libraries/bootstrap.bundle.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('./assets/libraries/popper.min.js') }}"></script>
    <script lang="javascript" src="{{ asset('./assets/libraries/wizard.js') }}"></script>

</body>

</html>
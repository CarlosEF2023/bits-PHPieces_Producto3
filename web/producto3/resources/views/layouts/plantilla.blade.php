<?php
// Comprueba si la sesión ya está iniciada
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
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
    @yield('navbar')
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
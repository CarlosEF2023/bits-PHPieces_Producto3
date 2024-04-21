<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\transfer_administrador;
use App\Models\transfer_vehiculo;
use App\Models\transfer_viajero;
use App\Models\transfer_hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $email = $request->input('email');
    Log::channel('mylog')->info('Email: ' . $email);
    $password = $request->input('password');
    Log::channel('mylog')->info('Password: ' . $password);

    // Intenta autenticar al administrador

    // Intenta autenticar al viajero
    $viajero = transfer_viajero::where('email', $email)->first();
    if ($viajero && $viajero->password === $password) {
        Auth::login($viajero);
        log::channel('mylog')->info('Autenticado como viajero, tipo usuario:'. $viajero->Id_tipo_usuario);
        return redirect()->intended('viajero');
    }

    $admin = transfer_administrador::where('email', $email)->first();
    if ($admin && $admin->Password === $password) {
        Auth::login($admin);
        log::channel('mylog')->info('Autenticado como administrador, tipo usuario:'. $admin->Id_tipo_usuario);
        return redirect()->intended('administrador');
    }

    // Intenta autenticar al vehiculo
    $vehiculo = transfer_vehiculo::where('email_conductor', $email)->first();
    if ($vehiculo && $vehiculo->password === $password) {
        Auth::login($vehiculo);
        log::channel('mylog')->info('Autenticado como vehiculo, tipo usuario:'. $vehiculo->Id_tipo_usuario);
        return redirect()->intended('vehiculo');
    }

    // Intenta autenticar al hotel
    $hotel = transfer_hotel::where('email', $email)->first();
    if ($hotel && $hotel->password === $password) {
        Auth::login($hotel);
        log::channel('mylog')->info('Autenticado como hotel, tipo usuario:'. $hotel->Id_tipo_usuario);
        return redirect()->intended('hotel');
    }

    // Autenticación fallida, redirige de nuevo al formulario de inicio de sesión
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
}
}
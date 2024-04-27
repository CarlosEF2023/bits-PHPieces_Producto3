<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\TransferAdministrador;
use App\Models\TransferVehiculo;
use App\Models\TransferViajeros;
use App\Models\TransferHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Intenta autenticar al administrador
        $user = TransferAdministrador::where('email', $email)->first();
        // Si el usuario existe y la contraseña es correcta
        if ($user && $user->Password === $password) {
            log::channel('mylog')->info('Autenticado como administrador, tipo usuario:' . $user->Id_tipo_usuario);
            // Almacena el usuario en la sesión
            $request->session()->put('user', $user);
            Session::put('id', $user->Id_usuario);
            Session::put('mail', $user->email);
            Session::put('usertype', $user->Id_tipo_usuario);
            Session::put('userroute', "administrador");
            Session::put('loggin', 'on');
            // Redirige al panel de administrador
            return redirect()->intended('administrador');
        }

        // Intenta autenticar al hotel
        $user = TransferHotel::where('email', $email)->first();
        // Si el usuario existe y la contraseña es correcta
        if ($user && $user->password === $password) {
            log::channel('mylog')->info('Autenticado como hotel, tipo usuario:' . $user->Id_tipo_usuario);
            //  Almacena el usuario en la sesión
            $request->session()->put('user', $user);
            Session::put('id', $user->id_hotel);
            Session::put('mail', $user->email);
            Session::put('usertype', $user->Id_tipo_usuario);
            Session::put('userroute', "hotel");
            Session::put('loggin', 'on');
            // Redirige al panel de hotel
            return redirect()->intended('hotel');
        }

        // Intenta autenticar al vehiculo
        $user = TransferVehiculo::where('email_conductor', $email)->first();
        if ($user && $user->password === $password) {
            log::channel('mylog')->info('Autenticado como vehiculo, tipo usuario:' . $user->Id_tipo_usuario);
            $request->session()->put('user', $user);
            Session::put('id', $user->id_vehiculo);
            Session::put('mail', $user->email_conductor);
            Session::put('usertype', $user->Id_tipo_usuario);
            Session::put('userroute', "vehiculo");
            Session::put('loggin', 'on');
            return redirect()->intended('vehiculo');
        }

        // Intenta autenticar al viajero
        $user = TransferViajeros::where('email', $email)->first();
        if ($user && $user->password === $password) {
            log::channel('mylog')->info('Autenticado como viajero, tipo usuario:' . $user->Id_tipo_usuario);
            $request->session()->put('user', $user);
            Session::put('id', $user->id_viajero);
            Session::put('mail', $user->email);
            Session::put('usertype', $user->Id_tipo_usuario);
            Session::put('userroute', "viajero");
            Session::put('loggin', 'on');
            return redirect()->intended('viajero');
        }
        Session::put('loggin', 'off');
        // Autenticación fallida, redirige de nuevo al formulario de inicio de sesión
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
}

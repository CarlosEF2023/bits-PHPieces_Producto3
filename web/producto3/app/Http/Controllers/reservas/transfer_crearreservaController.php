<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class transfer_crearreservaController extends Controller
{
    public function CrearReservaAeropuerto()
    {
        return view('reservas/aeropuerto/crear_reservaaeropuerto');
    }

    public function EnviarReservaAeropuerto(Request $request)
    {
        // Procesar los datos del formulario aquí
        dd($request->all());
    }
}

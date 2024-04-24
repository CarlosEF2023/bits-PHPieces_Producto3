<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;
use Illuminate\Support\Facades\DB;


class transfer_crearreservaController extends Controller
{

    public function index($valor){
        if ($valor=="1"){
            $this->CrearReservaAeropuerto();
        }
        if ($valor=="2"){
            $this->CrearReservaTotal();
        }
        if ($valor=="3"){
            $this->CrearReservaTotal();
        }
    }

    public function CrearReservaAeropuerto()
    {
        return view('reservas/aeropuerto/crear_reservaaeropuerto');
    }

    public function CrearReservaHotel()
    {
        return view('reservas/aeropuerto/crear_reservaaeropuerto');
    }

    public function CrearReservaTotal()
    {
        return view('reservas/aeropuerto/crear_reservaaeropuerto');
    }

    public function EnviarReservaAeropuerto(Request $request)
    {
        // Procesar los datos del formulario aquí
        dd($request->all());
    }
}

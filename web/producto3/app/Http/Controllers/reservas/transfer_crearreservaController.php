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
            return view('/reservas/aeropuerto/crear_reservaaeropuerto');
        }
        if ($valor=="2"){
            return view('/reservas/aeropuerto/crear_reservaaeropuerto');
        }
        if ($valor=="3"){
            return view('/reservas/aeropuerto/crear_reservaaeropuerto');
        }
    }


    public function EnviarReservaAeropuerto(Request $request)
    {
        // Procesar los datos del formulario aquí
        dd($request->all());
    }
}

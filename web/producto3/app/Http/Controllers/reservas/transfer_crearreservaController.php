<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class transfer_crearreservaController extends Controller
{

    public function index($valor){
        if ($valor=="1"){
            return view('/reservas/aeropuerto/crear_reservaaeropuerto');
        }
        if ($valor=="2"){
            return view('/reservas/hotel/crear_reservahotel');
        }
        if ($valor=="3"){
            return view('/reservas/completo/crear_reservacompleto');
        }
    }


    public function store(Request $request)
    {
        // Procesar los datos del formulario aquí
        log::channel('mylog')->info(json_encode($request->all()));







        dd($request->all());
    }
}

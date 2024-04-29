<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transfer_verreservaController extends Controller
{
    public function VerReserva($idreserva)
    {
        $reserva = TransferReservas::where('id_reserva', $idreserva)->first();
        $valor = $reserva->id_tipo_reserva;
        $ruta = ""; 
        if ($valor=="1"){
            $ruta = 'reservas/aeropuerto/ver_reservaaeropuerto';
        }
        if ($valor=="2"){
            $ruta = 'reservas/hotel/ver_reservahotel';
        }
        if ($valor=="3"){
            $ruta = 'reservas/completo/ver_reservacompleto';
        }

        return view($ruta, ['reservas' => $reserva]);
    }
}

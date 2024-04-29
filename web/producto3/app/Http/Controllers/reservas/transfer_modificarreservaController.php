<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transfer_modificarreservaController extends Controller
{
    public function ModificarReserva($idreserva)
    {
        $reserva = TransferReservas::where('id_reserva', $idreserva)->first();
        $valor = $reserva->id_tipo_reserva;
        $ruta="";
        if ($valor=="1"){
            $ruta='/reservas/aeropuerto/modificar_reservaaeropuerto';
        }
        if ($valor=="2"){
            $ruta='/reservas/hotel/modificar_reservahotel';
        }
        if ($valor=="3"){
            $ruta='/reservas/completo/modificar_reservacompleto';
        }
        return view($ruta, ['reservas' => $reserva]);
    }

    public function AccionModificar($request){
        
    }
}

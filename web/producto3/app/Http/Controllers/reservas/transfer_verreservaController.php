<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transfer_verreservaController extends Controller
{
    public function VerReserva($localizador)
    {
        $reserva = TransferReservas::where('localizador', $localizador)->first();
        $valor = $reserva->id_tipo_reserva;
        if ($valor=="1"){
            return view('/reservas/aeropuerto/ver_reservaaeropuerto', ['reservas' => $reserva]);
        }
        if ($valor=="2"){
            return view('/reservas/hotel/ver_reservahotel', ['reservas' => $reserva]);
        }
        if ($valor=="3"){
            return view('/reservas/completo/ver_reservaacompleto', ['reservas' => $reserva]);
        }
    }
}

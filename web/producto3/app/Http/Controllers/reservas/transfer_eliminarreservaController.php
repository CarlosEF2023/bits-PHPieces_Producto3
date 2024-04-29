<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class transfer_eliminarreservaController extends Controller
{
    public function EliminarReserva($idreserva)
    {
        //$reserva = TransferReservas::where('id_reserva', $idreserva)->first();
        return "Eliminar reserva".$idreserva;
    }

}

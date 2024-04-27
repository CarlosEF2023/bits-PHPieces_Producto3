<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class transfer_eliminarreservaController extends Controller
{
    public function EliminarReserva($valor)
    {
        return "Eliminar reserva".$valor;
    }

}

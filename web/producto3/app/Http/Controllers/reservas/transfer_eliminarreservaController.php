<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;
use Illuminate\Support\Facades\DB;

class transfer_eliminarreservaController extends Controller
{
    public function EliminarReserva($valor)
    {
        return "Eliminar reserva".$valor;
    }

}

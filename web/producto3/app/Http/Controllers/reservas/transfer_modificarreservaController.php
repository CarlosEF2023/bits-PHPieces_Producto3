<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;
use Illuminate\Support\Facades\DB;

class transfer_modificarreservaController extends Controller
{
    public function ModificarReserva($valor)
    {
        return "Modificar reserva". $valor;
    }
}
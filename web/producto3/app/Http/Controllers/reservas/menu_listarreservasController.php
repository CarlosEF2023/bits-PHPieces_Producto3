<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;
use Illuminate\Support\Facades\DB;


class transfer_crearreservaController extends Controller
{
    public function menulistarreservas()
    {
        return view('reservas/menulistarreservas');
    }

}

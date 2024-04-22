<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;
use Illuminate\Support\Facades\DB;


class menu_listarreservasController extends Controller
{
    public function index()
    {
        return view('reservas.menulistareservas');
    }

}

<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;

class transfer_listarreservaController extends Controller
{
    public function listar_todos (){
        $reservas = TransferReservas::all();
        return view('listado', ['reservas' => $reservas]);
    }
}

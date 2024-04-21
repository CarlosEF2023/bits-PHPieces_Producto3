<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transfer_reservas;

class transfer_listarreservaController extends Controller
{
    public function listar_todos (){
        $reservas = transfer_reservas::all();
        return view('listado', ['reservas' => $reservas]);
    }
}

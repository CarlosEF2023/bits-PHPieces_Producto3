<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class menu_listareservasController extends Controller
{
    public function index()
    {
        return view('reservas.menulistareservas');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoPanelController extends Controller
{
    // public function index()
    public function listaVehiculos()
    {
        // return view('vehiculo.vehiculoPanel');
        return "vehiculoPanel";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transfer_vehiculoController extends Controller
{
    public function index()
    {     
        // return "adminPanel";
        return view('vehiculo.index');       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transfer_viajerosController extends Controller
{
    public function index()
    {     
        // return "adminPanel";
        return view('viajero.index');       
    }
}
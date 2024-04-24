<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ViajeroPanelController extends Controller
{
    public function index()
    {     
        // return "adminPanel";
        return view('viajero.index');       
    }
}

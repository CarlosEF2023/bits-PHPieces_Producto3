<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ViajeroPanelController extends Controller
{
    public function index()
    {     
        log::channel('mylog')->info('Pasando por ViajeroPanelController');
        return "ViajeroPanelController";
        // return view('administrador.adminPanel');       
    }
}

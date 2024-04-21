<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminPanelController extends Controller
{

    public function index()
    {     
        log::channel('mylog')->info('Pasando por AdminPanelController');
        // return "adminPanel";
        return view('administrador.adminPanel');       
    }
}

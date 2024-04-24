<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ViajeroPanelController extends Controller
{

    public function index(Request $request)
    {     $user = $request->session()->get('user'); 
        // log::channel('mylog')->info('Pasando por ViajeroPanelController');
        return $user;
        // return view('administrador.adminPanel');       
    }
}

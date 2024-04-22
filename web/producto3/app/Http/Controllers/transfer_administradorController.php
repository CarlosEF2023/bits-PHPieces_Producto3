<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transfer_administradorController extends Controller
{
    public function index()
    {     
        // return "adminPanel";
        return view('administrador.index');       
    }
}

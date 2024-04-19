<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{

    // public function __invoke(Request $request)
    // {        
    //     return view('adminPanel');
    //     return "AdminPanelController";       
    // }
    public function index()
    {     
        // return "adminPanel";
        return view('administrador.adminPanel');       
    }
}

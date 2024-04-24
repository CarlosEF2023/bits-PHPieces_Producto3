<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoPanelController extends Controller
{
    // public function index()
    public function index(Request $request)
    {     
        $user = $request->session()->get('user');
        return view('vehiculo.index', ['user' =>$user] );       
    }
}

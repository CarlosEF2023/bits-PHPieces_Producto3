<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Recupera el usuario de la sesión
        $user = $request->session()->get('user');

        return view('index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class HotelPanelController extends Controller
{
    public function index()
    {     
        log::channel('mylog')->info('Pasando por HotelPanelController');
        return "hotelPanel";
        // return view('administrador.adminPanel');       
    }
}

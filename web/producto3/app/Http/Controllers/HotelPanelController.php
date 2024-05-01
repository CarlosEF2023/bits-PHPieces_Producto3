<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class HotelPanelController extends Controller
{
    public function index()
    {     
        log::channel('mylog')->info('Pasando por HotelPanelController');
<<<<<<< Updated upstream
        // return "hotelPanel";
=======
>>>>>>> Stashed changes
        return view('hotel.index');       
    }
}
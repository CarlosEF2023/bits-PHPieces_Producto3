<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transfer_hotelController extends Controller
{
    public function index()
    {     
        // return "adminPanel";
        return view('hotel.index');       
    }
}

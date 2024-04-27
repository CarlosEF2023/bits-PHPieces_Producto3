<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TransferHotel;

class HotelSelect extends Component
{

    public $selected;
    public $name;

    public function __construct($selected = null, $name = 'id_hotel')
    {
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        $hoteles = TransferHotel::all(); // Obtener todos los hoteles desde la base de datos

        return view('components.hotel-select', [
            'hoteles' => $hoteles
        ]);
    }
}

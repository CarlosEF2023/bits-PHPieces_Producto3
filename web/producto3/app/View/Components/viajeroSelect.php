<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TransferViajeros;

class viajeroSelect extends Component
{

    public $selected;
    public $name;

    public function __construct($selected = null, $name = 'id_viajero')
    {
        $this->selected = $selected;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    //    public function render(): View|Closure|string
    public function render()
    {
        $viajero = TransferViajeros::all(); // Obtener todos los hoteles desde la base de datos

        return view('components.viajero-select', [
            'viajeros' => $viajero
        ]);
        //return view('components.viajero-select');
    }
}

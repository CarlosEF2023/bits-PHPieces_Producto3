<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TransferVehiculo;

class conductorSelect extends Component
{
    
    public $selected;
    public $name;

    public function __construct($selected = null, $name = 'id_vehiculo')
    {
        $this->selected = $selected;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $conductores = TransferVehiculo::all(); // Obtener todos los hoteles desde la base de datos

        return view('components.vehiculo-select', [
            'vehiculos' => $conductores
        ]);
    }
}

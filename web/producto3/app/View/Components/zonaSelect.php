<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\TransferZona;

class ZonaSelect extends Component
{

    public $selected;
    public $name;

    public function __construct($selected = null, $name = 'id_zona')
    {
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        $zonas = TransferZona::all(); // Obtener todos los hoteles desde la base de datos

        return view('components.zona-select', [
            'zonas' => $zonas
        ]);
    }
}

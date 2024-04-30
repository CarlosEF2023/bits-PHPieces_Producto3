<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class transfer_eliminarreservaController extends Controller
{
    public function EliminarReserva($idreserva)
    {
        $reserva = TransferReservas::where('id_reserva', $idreserva)->first();
        $valor = $reserva->id_tipo_reserva;
        $ruta="";
        if ($valor=="1"){
            $ruta='/reservas/aeropuerto/eliminar_reservaaeropuerto';
        }
        if ($valor=="2"){
            $ruta='/reservas/hotel/eliminar_reservahotel';
        }
        if ($valor=="3"){
            $ruta='/reservas/completo/eliminar_reservacompleto';
        }
        return view($ruta, ['reservas' => $reserva]);
    }

    public  function AccionEliminar($idreserva){
        try {   
            $reserva = TransferReservas::find($idreserva);
            $valor = $reserva->id_tipo_reserva;
                // Verifica si se encontró la reserva
            if ($reserva) {
                // Elimina la reserva
                $reserva->delete();
                
                // Redirecciona de vuelta con un mensaje de éxito
                return redirect('/')->with('success', 'Reserva eliminada correctamente');
            } else {
                // Si no se encuentra la reserva, redirecciona con un mensaje de error
                return redirect()->back()->with('error', '¡La reserva no existe!');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', '¡No se ha podido eliminar!');
        }
    }
}

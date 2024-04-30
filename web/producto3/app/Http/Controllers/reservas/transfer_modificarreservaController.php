<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transfer_modificarreservaController extends Controller
{
    public function ModificarReserva($idreserva)
    {
        $reserva = TransferReservas::where('id_reserva', $idreserva)->first();
        $valor = $reserva->id_tipo_reserva;
        $ruta="";
        if ($valor=="1"){
            $ruta='/reservas/aeropuerto/modificar_reservaaeropuerto';
        }
        if ($valor=="2"){
            $ruta='/reservas/hotel/modificar_reservahotel';
        }
        if ($valor=="3"){
            $ruta='/reservas/completo/modificar_reservacompleto';
        }
        return view($ruta, ['reservas' => $reserva]);
    }

    public function AccionModificar(Request $request){
        try {
            // Buscar la reserva por su ID
            $reserva = TransferReservas::findOrFail($request->id_reserva);

            
            // Verificar si la reserva existe
            if (!$reserva) {
                return redirect()->back()->with('error', 'La reserva no existe');
            }
            
            // Actualizar solo los campos que se han modificado

            switch ($request->idtiporeserva){
                case "1":
                    $reserva->email_cliente = $request->emailreserva;
                    $reserva->fecha_modificacion = date("Y-m-d H:i:s");
                    $reserva->id_destino  = $request->Hotel_Destino;
                    $reserva->fecha_entrada = $request->diadellegada;
                    $reserva->hora_entrada = $request->horadellegada;
                    $reserva->numero_vuelo_entrada = $request->numerovuelo;
                    $reserva->origen_vuelo_entrada = $request->aeropuertoorigen;
                    $reserva->num_viajeros = $request->numeroviajeros;
                    break;
                case "2":
                    $reserva->email_cliente = $request->emailreserva;
                    $reserva->fecha_modificacion = date("Y-m-d H:i:s");
                    $reserva->id_destino  = $request->Hotel_Destino;
                    $reserva->fecha_entrada = $request->diadellegada;
                    $reserva->hora_entrada = $request->horadellegada;
                    $reserva->numero_vuelo_entrada = $request->numerovuelo;
                    $reserva->origen_vuelo_entrada = $request->aeropuertodestino;
                    $reserva->hora_vuelo_salida = $request->horadesalida;
                    $reserva->hora_recogida_hotel = $request->horaderecogida;
                    $reserva->fecha_vuelo_salida = $request->diadesalida;
                    $reserva->num_viajeros = $request->numeroviajeros;
                    break;
                case "3":
                    $reserva->email_cliente = $request->emailreserva;
                    $reserva->fecha_modificacion = date("Y-m-d H:i:s");
                    $reserva->id_destino  = $request->Hotel_Destino;
                    $reserva->fecha_entrada = $request->diadesalida;
                    $reserva->hora_entrada = $request->horadellegada;
                    $reserva->numero_vuelo_entrada = $request->numerovuelo;
                    $reserva->origen_vuelo_entrada = $request->aeropuertoorigen;
                    $reserva->hora_vuelo_salida = $request->horadesalida;
                    $reserva->hora_recogida_hotel = $request->horaderecogida;
                    $reserva->fecha_vuelo_salida = $request->diadesalida;
                    $reserva->num_viajeros = $request->numeroviajeros;
                    break;
            }    
            $reserva->save();
            // Redireccionar de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Reserva modificada correctamente');
        } catch (\Exception $e) {
            // Capturar cualquier excepción que pueda ocurrir durante el proceso de modificación
            return redirect()->back()->with('error', '¡No se ha podido modificar la reserva!'.$e);
            dd($reserva);
        }

    }
    
    /*
    public function AccionModificar(Request $request){
        try{
            // Buscar la reserva por su ID
            $reserva = TransferReservas::findOrFail($request->idreserva);
            // Verificar si la reserva existe
            if (!$reserva) {
                return redirect()->back()->with('error', 'La reserva no existe');
            }

            // Actualizar solo los campos que se han modificado
            if ($request->isDirty()) {
                $reserva->fill($request->getDirty())->save();
            }
            // Redireccionar de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Reserva modificada correctamente');
        } catch (\Exception $e) {
            // Capturar cualquier excepción que pueda ocurrir durante el proceso de modificación
            return redirect()->back()->with('error', '¡No se ha podido modificar la reserva!');
        }
    }

    */
}

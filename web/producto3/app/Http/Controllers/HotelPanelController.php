<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\TransferHotel;
use Exception;

class HotelPanelController extends Controller
{
    public function index()
    {     
        log::channel('mylog')->info('Pasando por HotelPanelController');
        return view('hotel.index');       
    }

    public function listaHoteles()
    {
        log::channel('mylog')->info('Pasando por lista hoteles');

        $hoteles = TransferHotel::all();

        return view('hotel.listaHoteles', compact('hoteles'));
    }

    public function frmNuevoHotel()
    {
        log::channel('mylog')->info('Pasando por formNuevoHotel');

        return view('hotel.frmNuevoHotel');
    }
    public function storeHotel(Request $request)
    {
        try {
            log::channel('mylog')->info(json_encode($request->all()));
            $hotel = new TransferHotel();
            $hotel->Caracteristicas = $request->Caracteristicas;
            $hotel->Comision = $request->Comision;
            $hotel->email = $request->email;
            $hotel->Id_tipo_usuario = $request->tipoUsuario;
            $hotel->id_zona = $request->id_zona;
            $hotel->NombreHotel = $request->NombreHotel;
            $hotel->password = $request->password;
            $hotel->usuario = $request->usuario;
            $hotel->save();
            $hoteles = TransferHotel::all();
            return redirect()->back()->with('success', 'Usuario hotel creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el usuario hotel.');
        }
    }

    public function frmModificarHotel(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar hotel ' . json_encode($request->input('hotelMod')));
        $email = $request->input('hotelMod');
        $hotel = TransferHotel::where('email', $email)->first();
        log::channel('mylog')->info('Hotel encontrado ' . json_encode($hotel));
        return view('hotel.frmModificarHotel', compact('hotel'));
    }

    public function updateHotel(Request $request, $id_hotel)
    {
        try {
            $hotel = TransferHotel::find($id_hotel);
            if ($hotel) {
                $hotel->NombreHotel = $request->NombreHotel;
                $hotel->Caracteristicas = $request->Caracteristicas;
                $hotel->Comision = $request->Comision;
                $hotel->email = $request->email;
                $hotel->id_zona = $request->id_zona;
                $hotel->usuario = $request->usuario;
                $hotel->password = $request->password;
                $hotel->save();
                return redirect()->back()->with('success', 'Datos del Hotel actualizados con éxito.');
            } else {
                return redirect()->back()->with('error', 'Hotel no encontrado.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '¡No se ha podido modificar los datos! ' . $e->getMessage());
        }
    }

    public function deleteHotel($id_hotel)
    {
        //Busca el hotel por el deleteHotel
        $hotel = TransferHotel::find($id_hotel);
        //Verifica si el viajero existe
        if ($hotel) {
            //Elimina el viajero
            $hotel->delete();
            // Redirige al viajero a la lista de usuarios con un mensaje de éxito
            return redirect()->back()->with('success', 'Usuario hotel eliminado con éxito.');
        } else {
            // Redirige al viajero a la lista de usuarios con un mensaje de error
            return redirect()->back()->with('error', 'Usuario hotel no encontrado.');
        }
    }

    public function frmDatosPersonalesHotel(Request $request)
    {
        log::channel('mylog')->info('Pasando por frmDatosPersonalesHotel');
        $hotel = $request->session()->get('user');
        log::channel('mylog')->info('hotel encontrado ' . json_encode($hotel));
        return view('hotel.frmDatosPersonalesHotel',  compact('hotel'));
    }

}
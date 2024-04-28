<?php

namespace App\Http\Controllers;

use App\Models\TransferAdministrador;
use App\Models\TransferHotel;
use App\Models\TransferTipoReserva;
use App\Models\TransferVehiculo;
use App\Models\TransferViajeros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AdminPanelController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        log::channel('mylog')->info('Pasando por AdminPanelController');
        // return "adminPanel";
        return view('administrador.adminPanel', ['user' => $user]);
    }
    public function tiposUsuarios()
    {
        log::channel('mylog')->info('Pasando por tiposUsuarios');

        return view('administrador.tiposUsuarios');
    }
    public function listaAdministradores()
    {
        log::channel('mylog')->info('Pasando por listaAdministradores');

        $administradores = TransferAdministrador::all();
        // return $administradores;
        return view('administrador.listaAdministradores', compact('administradores'));
    }
    public function formNuevoAdministrador()
    {
        log::channel('mylog')->info('Pasando por formNuevoAdministrador');

        return view('administrador.frmNuevoAdministrador');
    }
    public function store(Request $request)
    {
        try {
            log::channel('mylog')->info(json_encode($request->all()));
            $administrador = new TransferAdministrador();
            $administrador->Id_tipo_usuario = $request->tipoUsuario;
            $administrador->Username = $request->username;
            $administrador->nombre = $request->nombre;
            $administrador->Password = $request->password;
            $administrador->email = $request->email;
            $administrador->Apellido1 = $request->primerApellido;
            $administrador->Apellido2 = $request->segundoApellido;
            $administrador->Id_tipo_usuario = $request->tipoUsuario;
            $administrador->save();
            $administradores = TransferAdministrador::all();
            return redirect()->route('administrador.listaAdministradores')->with('success', 'Usuario creado con éxito.');
        } catch (\Exception $e) {
            log::channel('mylog')->error('Error al crear el usuario: ' . $e->getMessage());
            return redirect()->route('administrador.listaAdministradores')->with('error', 'Error al crear el usuario.');
        }
    }
    public function frmModificarAdmin(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar administrador ' . json_encode($request->input('adminMod')));
        $email = $request->input('adminMod');
        $administrador = TransferAdministrador::where('email', $email)->first();
        log::channel('mylog')->info('Administrador encontrado ' . json_encode($administrador));
        return view('administrador.frmModificarAdmin', compact('administrador'));
    }

    public function update(Request $request, $Id_usuario)
    {

        $administrador = TransferAdministrador::find($Id_usuario);
        if ($administrador) {
            $administrador->Username = $request->username;
            $administrador->nombre = $request->nombre;
            $administrador->Password = $request->password;
            $administrador->email = $request->email;
            $administrador->Apellido1 = $request->primerApellido;
            $administrador->Apellido2 = $request->segundoApellido;
            // $administrador->Id_tipo_usuario = $request->Id_tipo_usuario;
            $administrador->update();
            $administradores = TransferAdministrador::all();
            return redirect()->route('administrador.listaAdministradores')->with('success', 'Usuario actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaAdministradores')->with('error', 'Usuario no encontrado.');
        }
    }
    public function delete($Id_usuario)
    {
        //Busca el administrador por el Id_usuario
        $administrador = TransferAdministrador::find($Id_usuario);
        //Verifica si el administrador existe
        if ($administrador) {
            //Elimina el administrador
            $administrador->delete();
            // Redirige al administrador a la lista de usuarios con un mensaje de éxito
            return redirect()->route('administrador.listaAdministradores')->with('success', 'Usuario eliminado con éxito.');
        } else {
            // Redirige al administrador a la lista de usuarios con un mensaje de error
            return redirect()->route('administrador.listaAdministradores')->with('error', 'Usuario no encontrado.');
        }
    }
    public function listaVehiculos()
    {
        log::channel('mylog')->info('Pasando por lista Vehículos');

        $vehiculos = TransferVehiculo::all();
        // return $administradores;
        return view('administrador.listaVehiculos', compact('vehiculos'));
    }
    public function frmNuevoVehiculo()
    {
        log::channel('mylog')->info('Pasando por frmNuevoVehiculo');

        return view('administrador.frmNuevoVehiculo');
    }
    public function storeVehiculo(Request $request)
    {
        try {
            log::channel('mylog')->info(json_encode($request->all()));
            $vehiculo = new TransferVehiculo();
            $vehiculo->Descripcion = $request->descripcion;
            $vehiculo->email_conductor = $request->email;
            $vehiculo->password = $request->password;
            $vehiculo->Id_tipo_usuario = $request->tipoUsuario;
            $vehiculo->save();
            $vehiculos = TransferVehiculo::all();
            return redirect()->route('administrador.listaVehiculos')->with('success', 'Vehículo creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('administrador.listaVehiculos')->with('error', 'Error al crear el vehículo.');
        }
    }
    public function deleteVehiculo($id_vehiculo)
    {
        //Busca el vehiculo por el id_vehiculo
        $vehiculo = TransferVehiculo::find($id_vehiculo);
        //Verifica si el vehículo existe
        if ($vehiculo) {
            //Elimina el administrador
            $vehiculo->delete();
            // Redirige al vehiculo a la lista de usuarios con un mensaje de éxito
            return redirect()->route('administrador.listaVehiculos')->with('success', 'Vehículo eliminado con éxito.');
        } else {
            // Redirige al administrador a la lista de usuarios con un mensaje de error
            return redirect()->route('administrador.listaVehiculos')->with('error', 'Vehículo no encontrado.');
        }
    }

    public function frmModificarVehiculo(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar vehiculo ' . json_encode($request->input('vehiculoMod')));
        $email = $request->input('vehiculoMod');
        $vehiculo = TransferVehiculo::where('email_conductor', $email)->first();
        log::channel('mylog')->info('Vehiculo encontrado ' . json_encode($vehiculo));
        return view('administrador.frmModificarVehiculo', compact('vehiculo'));
    }

    public function updateVehiculo(Request $request, $id_vehiculo)
    {

        $vehiculo = TransferVehiculo::find($id_vehiculo);
        if ($vehiculo) {
            $vehiculo->Descripcion = $request->descripcion;
            $vehiculo->email_conductor = $request->email_conductor;
            $vehiculo->password = $request->password;
            // $vehiculo->Id_tipo_usuario = $request->Id_tipo_usuario;
            $vehiculo->update();
            $vehiculos = TransferVehiculo::all();
            return redirect()->route('administrador.listaVehiculos')->with('success', 'Vehículo actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaVehiculos')->with('error', 'Vehículo no encontrado.');
        }
    }
    public function listaViajeros()
    {
        log::channel('mylog')->info('Pasando por lista viajeros');

        $viajeros = TransferViajeros::all();

        return view('administrador.listaViajeros', compact('viajeros'));
    }
    public function frmNuevoViajero()
    {
        log::channel('mylog')->info('Pasando por frmNuevoViajero');

        return view('administrador.frmNuevoViajero');
    }

    public function frmModificarViajero(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar viajero ' . json_encode($request->input('viajeroMod')));
        $email = $request->input('viajeroMod');
        $viajero = TransferViajeros::where('email', $email)->first();
        log::channel('mylog')->info('Viajero encontrado ' . json_encode($viajero));
        return view('administrador.frmModificarViajero', compact('viajero'));
    }



    public function storeViajero(Request $request)
    {
        try {
            log::channel('mylog')->info(json_encode($request->all()));
            $viajero = new TransferViajeros();
            $viajero->apellido1 = $request->apellido1;
            $viajero->apellido2 = $request->apellido2;
            $viajero->ciudad = $request->ciudad;
            $viajero->codigoPostal = $request->codigoPostal;
            $viajero->direccion = $request->direccion;
            $viajero->email = $request->email;
            $viajero->Id_tipo_usuario = $request->tipoUsuario;
            $viajero->nombre = $request->nombre;
            $viajero->pais = $request->pais;
            $viajero->password = $request->password;
            $viajero->save();
            $viajeros = TransferViajeros::all();
            return redirect()->route('administrador.listaViajeros')->with('success', 'Viajero creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('administrador.listaViajeros')->with('error', 'Error al crear el viajero.');
        }
    }
    public function updateViajero(Request $request, $id_viajero)
    {

        $viajero = TransferViajeros::find($id_viajero);
        if ($viajero) {
            $viajero->apellido1 = $request->apellido1;
            $viajero->apellido2 = $request->apellido2;
            $viajero->ciudad = $request->ciudad;
            $viajero->codigoPostal = $request->codigoPostal;
            $viajero->direccion = $request->direccion;
            $viajero->email = $request->email;
            // $viajero->Id_tipo_usuario = $request->tipoUsuario;
            $viajero->nombre = $request->nombre;
            $viajero->pais = $request->pais;
            $viajero->password = $request->password;
            $viajero->update();
            $viajeros = TransferViajeros::all();
            return redirect()->route('administrador.listaViajeros')->with('success', 'Viajero actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaViajeros')->with('error', 'Viajero no encontrado.');
        }
    }
    public function deleteViajero($id_viajero)
    {
        //Busca el viajero por el id_vehiculo
        $viajero = TransferViajeros::find($id_viajero);
        //Verifica si el viajero existe
        if ($viajero) {
            //Elimina el viajero
            $viajero->delete();
            // Redirige al viajero a la lista de usuarios con un mensaje de éxito
            return redirect()->route('administrador.listaViajeros')->with('success', 'Viajero eliminado con éxito.');
        } else {
            // Redirige al viajero a la lista de usuarios con un mensaje de error
            return redirect()->route('administrador.listaViajeros')->with('error', 'Viajero no encontrado.');
        }
    }

    public function listaHoteles()
    {
        log::channel('mylog')->info('Pasando por lista hoteles');

        $hoteles = TransferHotel::all();

        return view('administrador.listaHoteles', compact('hoteles'));
    }

    public function frmNuevoHotel()
    {
        log::channel('mylog')->info('Pasando por formNuevoHotel');

        return view('administrador.frmNuevoHotel');
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
            return redirect()->route('administrador.listaHoteles')->with('success', 'Usuario hotel creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('administrador.listaHoteles')->with('error', 'Error al crear el usuario hotel.');
        }
    }

    public function frmModificarHotel(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar hotel ' . json_encode($request->input('hotelMod')));
        $email = $request->input('hotelMod');
        $hotel = TransferHotel::where('email', $email)->first();
        log::channel('mylog')->info('Hotel encontrado ' . json_encode($hotel));
        return view('administrador.frmModificarHotel', compact('hotel'));
    }



    public function updateHotel(Request $request, $id_hotel)
    {

        $hotel = TransferHotel::find($id_hotel);
        if ($hotel) {
            $hotel->Caracteristicas = $request->Caracteristicas;
            $hotel->Comision = $request->Comision;
            $hotel->email = $request->email;
            // $hotel->Id_tipo_usuario = $hotel->Id_tipo_usuario;// mejor no actualizarlo
            $hotel->id_zona = $request->id_zona;
            $hotel->NombreHotel = $request->NombreHotel;
            $hotel->password = $request->password;
            $hotel->usuario = $request->usuario;
            $hotel->update();
            $hoteles = TransferHotel::all();
            return redirect()->route('administrador.listaHoteles')->with('success', 'Usuario hotel actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaHoteles')->with('error', 'Usuario hotel no encontrado.');
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
            return redirect()->route('administrador.listaHoteles')->with('success', 'Usuario hotel eliminado con éxito.');
        } else {
            // Redirige al viajero a la lista de usuarios con un mensaje de error
            return redirect()->route('administrador.listaHoteles')->with('error', 'Usuario hotel no encontrado.');
        }
    }

    public function listaTrayectos()
    {
        log::channel('mylog')->info('Pasando por lista trayectos');

        $trayectos = TransferTipoReserva::all();

        return view('administrador.listaTrayectos', compact('trayectos'));
    }

    public function frmNuevoTrayecto()
    {
        log::channel('mylog')->info('Pasando por frmNuevoTrayecto');

        return view('administrador.frmNuevoTrayecto');
    }

    public function storeTrayecto(Request $request)
    {
        try {
            log::channel('mylog')->info(json_encode($request->all()));
            $trayecto = new TransferTipoReserva();
            $trayecto->Descripcion = $request->descripcion; 
            $trayecto->save();
            $trayecto = TransferTipoReserva::all();
            return redirect()->route('administrador.listaTrayectos')->with('success', 'Trayecto creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('administrador.listaTrayectos')->with('error', 'Error al crear el trayecto.');
        }
    }

    public function frmModificarTrayecto(Request $request)
    {
        log::channel('mylog')->info('Pasando por modificar trayecto ' . json_encode($request->input('trayectoMod')));
        $id_tipo_reserva = $request->input('trayectoMod');
        $trayecto = TransferTipoReserva::where('id_tipo_reserva', $id_tipo_reserva)->first();
        log::channel('mylog')->info('Trayecto encontrado ' . json_encode($trayecto));
        return view('administrador.frmModificarTrayecto', compact('trayecto'));
    }



    public function updateTrayecto(Request $request, $id_tipo_reserva)
    {

        $trayecto = TransferTipoReserva::find($id_tipo_reserva);
        if ($trayecto) {
            $trayecto->Descripcion = $request->descripcion;
            $trayecto->update();
            $trayectos = TransferTipoReserva::all();
            return redirect()->route('administrador.listaTrayectos')->with('success', 'El trayecto se ha actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaHoteles')->with('error', 'No se ha podido actualizar el trayecto.');
        }
    }


    // 
}

<?php

namespace App\Http\Controllers;

use App\Models\TransferAdministrador;
use App\Models\TransferVehiculo;
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
            $administrador->Id_tipo_usuario = $request->Id_tipo_usuario;
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

    public function updateVehiculo(Request $request, $email_conductor)
    {

        $vehiculo = TransferVehiculo::find($email_conductor);
        if ($vehiculo) {
            $vehiculo->Descripcion = $request->descripcion;
            $vehiculo->email_conductor = $request->email_conductor;
            $vehiculo->password = $request->password;
            $vehiculo->Id_tipo_usuario = $request->Id_tipo_usuario;
            $vehiculo->update();
            $vehiculos = TransferVehiculo::all();
            return redirect()->route('administrador.listaVehiculos')->with('success', 'Vehículo actualizado con éxito.');
        } else {
            return redirect()->route('administrador.listaVehiculos')->with('error', 'Vehículo no encontrado.');
        }
    }
}

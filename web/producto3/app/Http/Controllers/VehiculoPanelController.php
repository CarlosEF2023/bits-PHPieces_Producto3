<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\TransferVehiculo;
use App\Models\TransferViajeros;

class VehiculoPanelController extends Controller
{
    // public function index()
    public function index(Request $request)
    {     
        $user = $request->session()->get('user');
        return view('vehiculo.index', ['user' =>$user] );       
    }

    public function vertramos()
    {     
        return view('vehiculo.menulistaritinerarios');       
    }

    public function cambiarDatos(Request $request){
        $alertas = [];
        $userId = $request->session()->get('user')->id_vehiculo;

        // Buscar al usuario en la base de datos utilizando el ID
        $user = TransferVehiculo::find($userId);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            $descripcion = $_POST['descripcion'];
            $email = $_POST['email_conductor'];

            $existeUsuario = TransferVehiculo::where('email_conductor', $email)->exists();

            if($existeUsuario && $user->email_conductor !== $email){
        
                TransferVehiculo::setAlerta('alert-danger', 'Email no valido, cuenta ya registrada');
                            $alertas = TransferVehiculo::getAlertas();
            } else{

                $user->Descripcion = $descripcion;
                $user->email_conductor = $email;
                $user->save();
                TransferVehiculo::setAlerta('alert-success', 'Datos del vehiculo guardados!');
                $alertas = TransferVehiculo::getAlertas();
            }
        
        }

        return view('vehiculo.cambio-datos-vehiculo')->with('alertas', $alertas)->with('user', $user);
    }

    public function cambiarContraseña(Request $request){
        $alertas = [];
        $userId = $request->session()->get('user')->id_vehiculo;

        // Buscar al usuario en la base de datos utilizando el ID
        $user = TransferVehiculo::find($userId);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
             
            $contraseña_antigua = $_POST['contraseña_antigua'];
            $contraseña_nueva = $_POST['contraseña_nueva'];

            if($contraseña_antigua !== $user->password){
        
                TransferVehiculo::setAlerta('alert-danger', 'Contraseña antigua no coincide');
                            $alertas = TransferVehiculo::getAlertas();
            } else{

                $user->password = $contraseña_nueva;
                $user->save();
                TransferVehiculo::setAlerta('alert-success', 'Contraseña actualizada!');
                $alertas = TransferVehiculo::getAlertas();
            }
        
        }

        return view('vehiculo.cambio-contraseña-vehiculo')->with('alertas', $alertas)->with('user', $user);
    }

    public function mostrarTodos()
    {
        return TransferVehiculo::all();
    }

    public function mostrarTramo($tramo, $fecha, $id){
        $reservas = (new TransferVehiculo)->filtrarPorConductorYTramo($tramo, $fecha, $id);
        return view('reservas.listados.ver_itinerario')->with('listado', $reservas);
    }

}


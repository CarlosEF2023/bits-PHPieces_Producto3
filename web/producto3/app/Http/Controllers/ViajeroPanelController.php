<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\TransferReservas;
use App\Models\TransferViajeros;

class ViajeroPanelController extends Controller
{
    public function index(Request $request)
    {     
        $user = $request->session()->get('user');
        $email = $user->email;

    $reservas = TransferReservas::where('email_cliente', $email)->get();
        return view('viajero.index', ['user' =>$user] , ['reservas' =>$reservas]  );       
    }
    
    public function registro()
    {     
        log::channel('mylog')->info('Pasando por ViajeroPanelController');
        
        $alertas = [];
        $resultadoInsercion = 0;
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $transfer_viajero = new TransferViajeros($_POST);
    
            $alertas = $transfer_viajero->validarNuevaCuenta();
    
            if(empty($alertas)){
                $existeViajero = TransferViajeros::where('email', $transfer_viajero->email)->first();
                
                if($existeViajero){
                    // El usuario ya existe
                    TransferViajeros::setAlerta('alert-danger', 'El Usuario ya está registrado');
                    $alertas = TransferViajeros::getAlertas();
                } else {
                    // El usuario no existe, procede con la creación
                    $datosUsuarioNuevo = [
                        'nombre' => $_POST['nombre'],
                        'apellido1' => $_POST['apellido1'],
                        'apellido2' => $_POST['apellido2'] ?? null,
                        'direccion' => $_POST['direccion'],
                        'codigoPostal' => $_POST['codigoPostal'],
                        'ciudad' => $_POST['ciudad'],
                        'pais' => $_POST['pais'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'Id_tipo_usuario' => 6
                    ];
    
                    try {
                        $resultadoInsercion = TransferViajeros::create($datosUsuarioNuevo);
                        TransferViajeros::setAlerta('alert-success', 'El Usuario ha sido registrado con exito!');
                        $alertas = TransferViajeros::getAlertas();
                    } catch (\Exception $e) {
                        // Manejo de errores si ocurre alguna excepción
                        return redirect()->back()->with('error', 'Error al insertar el usuario: ' . $e->getMessage());
                    }
                }
            }
        }
    
        return view('viajero.registrarse', compact('alertas', 'resultadoInsercion'));
    }
    
    
    
    public function cambiarDatos(Request $request)
        {     
            log::channel('mylog')->info('Pasando por ViajeroPanelController');
            // Obtener el ID del usuario de la sesión
            $userId = $request->session()->get('user')->id_viajero;
    
            // Buscar al usuario en la base de datos utilizando el ID
            $user = TransferViajeros::find($userId);
            $alertas = [];
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                
    
                $existeUsuario = TransferViajeros::where('email', $email)->exists();
               
                if($existeUsuario && $user->email !== $email){
                 
                    TransferViajeros::setAlerta('alert-danger', 'Error, Email ya registrado, Elige otro');
                    $alertas = TransferViajeros::getAlertas();
                }
                else{
                    $user->nombre = $nombre;
                    $user->email = $email;
                    $user->save();
                    TransferViajeros::setAlerta('alert-success', 'Datos actualizados!');
                    $alertas = TransferViajeros::getAlertas();
                }
    
            }
            return view('viajero.cambio-datos')->with('alertas', $alertas)->with('user', $user);
        }
    
    
        
        public function cambiarContraseña(Request $request)
        {     
            log::channel('mylog')->info('Pasando por ViajeroPanelController');
            $userId = $request->session()->get('user')->id_viajero;
    
            // Buscar al usuario en la base de datos utilizando el ID
            $user = TransferViajeros::find($userId);
            $alertas = [];
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $contraseña_antigua = $_POST['contraseña_antigua'];
                $contraseña_nueva = $_POST['contraseña_nueva'];
    
                if ($contraseña_antigua !== $user->password){
                    TransferViajeros::setAlerta('alert-danger', 'Contraseña antigua no coincide');  
                    $alertas = TransferViajeros::getAlertas();
                } else{
                    $user->password = $contraseña_nueva;
                    $user->save();
                    TransferViajeros::setAlerta('alert-success', 'Datos actualizados!');
                    $alertas = TransferViajeros::getAlertas();
                }
            }
    
            return view('viajero.cambio-contraseña')->with('alertas', $alertas)->with('user', $user);
                 
        }
}

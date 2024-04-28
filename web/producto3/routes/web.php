<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ViajeroPanelController;
use App\Http\Controllers\VehiculoPanelController;
use App\Http\Controllers\HotelPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\logoutController;

use App\Http\Controllers\reservas\menu_listareservasController;
use App\Http\Controllers\reservas\menu_reservasController;
use App\Http\Controllers\reservas\transfer_crearreservaController;
use App\Http\Controllers\reservas\transfer_eliminarreservaController;
use App\Http\Controllers\reservas\transfer_modificarreservaController;
use App\Http\Controllers\reservas\transfer_verreservaController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', HomeController::class)->name('home');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('registrarse', [ViajeroPanelController::class, 'registro'])->name('registro');
    Route::post('registrarse', [ViajeroPanelController::class, 'registro'])->name('registro');

Route::middleware(['checkAdmin'])->group(function () {
    Route::get('administrador', [AdminPanelController::class, 'index'])->name('administrador');
    Route::get('administrador/tiposUsuarios', [AdminPanelController::class, 'tiposUsuarios'])->name('administrador.tiposUsuarios');
    Route::get('administrador/listaAdministradores', [AdminPanelController::class, 'listaAdministradores'])->name('administrador.listaAdministradores');
    Route::get('administrador/formNuevoAdministrador', [AdminPanelController::class, 'formNuevoAdministrador'])->name('administrador.formNuevoAdministrador');
    Route::post('administrador/store', [AdminPanelController::class, 'store'])->name('administrador.store');
    Route::post('administrador/frmModificarAdmin', [AdminPanelController::class, 'frmModificarAdmin'])->name('administrador.frmModificarAdmin');
    Route::put('administrador/update/{Id_usuario}', [AdminPanelController::class, 'update'])->name('administrador.update');
    Route::delete('administrador/delete/{Id_usuario}', [AdminPanelController::class, 'delete'])->name('administrador.delete');
    Route::get('administrador/listaVehiculos', [AdminPanelController::class, 'listaVehiculos'])->name('administrador.listaVehiculos');
    Route::get('administrador/frmNuevoVehiculo', [AdminPanelController::class, 'frmNuevoVehiculo'])->name('administrador.frmNuevoVehiculo');
    // Esta ruta podría estar en el controlador de vehículos ya que es para guardar un nuevo vehículo
    // Pero como no está implementado ese controlador lo dejo aquí por ahora
    Route::post('administrador/storeVehiculo', [AdminPanelController::class, 'storeVehiculo'])->name('administrador.storeVehiculo');
    //////////
    Route::post('administrador/frmModificarVehiculo', [AdminPanelController::class, 'frmModificarVehiculo'])->name('administrador.frmModificarVehiculo');
    Route::put('administrador/updateVehiculo/{id_vehiculo}', [AdminPanelController::class, 'updateVehiculo'])->name('administrador.updateVehiculo');
    Route::delete('administrador/deleteVehiculo/{id_vehiculo}', [AdminPanelController::class, 'deleteVehiculo'])->name('administrador.deleteVehiculo');    
    Route::get('administrador/listaViajeros', [AdminPanelController::class, 'listaViajeros'])->name('administrador.listaViajeros');
    Route::get('administrador/frmNuevoViajero', [AdminPanelController::class, 'frmNuevoViajero'])->name('administrador.frmNuevoViajero');
    Route::post('administrador/storeViajero', [AdminPanelController::class, 'storeViajero'])->name('administrador.storeViajero');
    Route::post('administrador/frmModificarViajero', [AdminPanelController::class, 'frmModificarViajero'])->name('administrador.frmModificarViajero');
    Route::put('administrador/updateViajero/{id_viajero}', [AdminPanelController::class, 'updateViajero'])->name('administrador.updateViajero');
    Route::delete('administrador/deleteViajero/{id_viajero}', [AdminPanelController::class, 'deleteViajero'])->name('administrador.deleteViajero');    
    Route::get('administrador/listaHoteles', [AdminPanelController::class, 'listaHoteles'])->name('administrador.listaHoteles');
    Route::get('administrador/frmNuevoHotel', [AdminPanelController::class, 'frmNuevoHotel'])->name('administrador.frmNuevoHotel');
    Route::post('administrador/storeHotel', [AdminPanelController::class, 'storeHotel'])->name('administrador.storeHotel');
    Route::post('administrador/frmModificarHotel', [AdminPanelController::class, 'frmModificarHotel'])->name('administrador.frmModificarHotel');
    Route::put('administrador/updateHotel/{id_hotel}', [AdminPanelController::class, 'updateHotel'])->name('administrador.updateHotel');
    Route::delete('administrador/deleteHotel/{id_hotel}', [AdminPanelController::class, 'deleteHotel'])->name('administrador.deleteHotel');    

 

    


    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'administrador/'
    Route::get('administrador/reservas/menu', [menu_reservasController::class, 'index'])->name('administrador.reservas.menu');
    Route::get('administrador/reservas/listar', [menu_listareservasController::class, 'index'])->name('administrador.reservas.listar');
    Route::get('administrador/reservas/crear/{valor}', [transfer_crearreservaController::class, 'index'])->name('administrador.reservas.crear');
    Route::post('administrador/reservas/nuevo', [transfer_crearreservaController::class, 'store'])->name('administrador.reservas.nuevo');
    Route::get('administrador/reservas/modificar/{valor}', [transfer_modificarreservaController::class, 'ModificarReserva'])->name('administrador.reservas.modificar');
    Route::get('administrador/reservas/ver/{valor}', [transfer_verreservaController::class, 'VerReserva'])->name('administrador.reservas.ver');
    Route::get('administrador/reservas/eliminar/{valor}', [transfer_eliminarreservaController::class, 'EliminarReserva'])->name('administrador.reservas.eliminar');

    
    
});


Route::middleware(['checkVehiculo'])->group(function () {
    Route::get('vehiculo', [VehiculoPanelController::class, 'index']);
    Route::get('vehiculo.itinerario', [menu_listareservasController::class, 'index'])->name('vehiculo.itinerario');
    Route::get('vehiculo/cambiar-datos', [VehiculoPanelController::class, 'cambiarDatos'])->name('cambiarDatos');
    Route::post('vehiculo/cambiar-datos', [VehiculoPanelController::class, 'cambiarDatos'])->name('cambiarDatos');
    Route::get('vehiculo/cambiar-contraseña', [VehiculoPanelController::class, 'cambiarContraseña'])->name('cambiarContraseña');
    Route::post('vehiculo/cambiar-contraseña', [VehiculoPanelController::class, 'cambiarContraseña'])->name('cambiarContraseña');
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'vehiculo/'
});

Route::middleware(['checkViajero'])->group(function () {
    Route::get('viajero', [ViajeroPanelController::class, 'index']);
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'viajero/'
    Route::get('viajero/reservas/menu', [menu_reservasController::class, 'index'])->name('viajero.reservas.menu');
    Route::get('viajero/reservas/listar', [menu_listareservasController::class, 'index'])->name('viajero.reservas.listar');
    Route::get('viajero/reservas/crear/{valor}', [transfer_crearreservaController::class, 'index'])->name('viajero.reservas.crear');
    Route::get('viajero/reservas/modificar/{valor}', [transfer_modificarreservaController::class, 'ModificarReserva'])->name('viajero.reservas.modificar');
    Route::get('viajero/reservas/ver/{valor}', [transfer_verreservaController::class, 'VerReserva'])->name('viajero.reservas.ver');
    Route::get('viajero/reservas/eliminar/{valor}', [transfer_eliminarreservaController::class, 'EliminarReserva'])->name('viajero.reservas.eliminar');
    Route::get('viajero/cambiar-datos', [ViajeroPanelController::class, 'cambiarDatos'])->name('cambiarDatos');
    Route::post('viajero/cambiar-datos', [ViajeroPanelController::class, 'cambiarDatos'])->name('cambiarDatos');
    Route::get('viajero/cambiar-contraseña', [ViajeroPanelController::class, 'cambiarContraseña'])->name('cambiarcontraseña');
    Route::post('viajero/cambiar-contraseña', [ViajeroPanelController::class, 'cambiarContraseña'])->name('cambiarcontraseña');
});

Route::middleware(['checkHotel'])->group(function () {
    Route::get('hotel', [HotelPanelController::class, 'index']);
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'hotel/'
    Route::get('hotel/reservas/menu', [menu_reservasController::class, 'index'])->name('hotel.reservas.menu');
    Route::get('hotel/reservas/listar', [menu_listareservasController::class, 'index'])->name('hotel.reservas.listar');
    Route::get('hotel/reservas/crear/{valor}', [transfer_crearreservaController::class, 'index'])->name('hotel.reservas.crear');
    Route::get('hotel/reservas/modificar/{valor}', [transfer_modificarreservaController::class, 'ModificarReserva'])->name('hotel.reservas.modificar');
    Route::get('hotel/reservas/ver/{valor}', [transfer_verreservaController::class, 'VerReserva'])->name('hotel.reservas.ver');
    Route::get('hotel/reservas/eliminar/{valor}', [transfer_eliminarreservaController::class, 'EliminarReserva'])->name('hotel.reservas.eliminar');
  

});

// Debería ir un grupo para reservas compartido por checkAdmin y checkViajero y creo que checkHotel
// si es que los tres tienen que tener acceso a sus vistas
// --------------------------------------------------------------------------------
/*
Route::get('/reservas/menu', [menu_reservasController::class, 'index'])->name('reservas.menu');
Route::get('/reservas/listar', [menu_listareservasController::class, 'index'])->name('reservas.listar');
Route::get('/reservas/crear/{valor}', [transfer_crearreservaController::class, 'index'])->name('reservas.crear');
Route::get('/reservas/modificar/{valor}', [transfer_modificarreservaController::class, 'ModificarReserva'])->name('reservas.modificar');
Route::get('/reservas/ver/{valor}', [transfer_verreservaController::class, 'VerReserva'])->name('reservas.ver');
Route::get('/reservas/eliminar/{valor}', [transfer_eliminarreservaController::class, 'EliminarReserva'])->name('reservas.eliminar');
*/

Route::get('logout', [logoutController::class, 'index'])->name('logout');

// habra que unificar estas rutas en una sola



// Route::get('/administrador', function () {
//     return "administrador";
// })->name('administrador');

// Route::get('/vehiculo', function () {
//     return "vehiculo";
// })->name('vehiculo');

// Route::get('/viajero', function () {
//     return "viajero";
// })->name('viajero');

// Route::get('/hotel', function () {
//     return "hotel";
// })->name('hotel');





// Route::get('reservas', function () {
//     return 'reservas';
// });

// Route::get('/db-test', function () {
//     try {
//         DB::connection()->getPdo();
//         return "Conexión con la base de datos exitosa!";
//     } catch (\Exception $e) {
//         return "Error al conectar con la base de datos: " . $e->getMessage();
//     }
// });

// Route::get('/db-test2', function () {
//     $host = '127.0.0.1';
//     $database ='wordpress1';
//     $username = 'root';
//     $password = '';
//     $port = 3306;

//     $mysqli = new mysqli($host, $username, $password, $database, $port);

//     if ($mysqli->connect_error) {
//         return "Error al conectar con la base de datos: " . $mysqli->connect_error;
//     } else {
//         $mysqli->close();
//         return "Conexión con la base de datos exitosa!";
//     }
// });
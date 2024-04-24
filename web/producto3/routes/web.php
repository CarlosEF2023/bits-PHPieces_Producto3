<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ViajeroPanelController;
use App\Http\Controllers\VehiculoPanelController;
use App\Http\Controllers\HotelPanelController;
use App\Http\Controllers\AuthController;

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
    // Esta ruta podría estar en el contorlador de vehículos ya que es para guardar un nuevo vehículo
    // Pero como no está implementado ese controlador lo dejo aquí por ahora
    Route::post('administrador/storeVehiculo', [AdminPanelController::class, 'storeVehiculo'])->name('administrador.storeVehiculo');
    //////////
    Route::post('administrador/frmModificarVehiculo', [AdminPanelController::class, 'frmModificarVehiculo'])->name('administrador.frmModificarVehiculo');
    Route::put('administrador/updateVehiculo/{id_vehiculo}', [AdminPanelController::class, 'updateVehiculo'])->name('administrador.updateVehiculo');
    Route::delete('administrador/deleteVehiculo/{id_vehiculo}', [AdminPanelController::class, 'deleteVehiculo'])->name('administrador.deleteVehiculo');    

    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'administrador/'
});


Route::middleware(['checkVehiculo'])->group(function () {
    Route::get('vehiculo', [VehiculoPanelController::class, 'index']);
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'vehiculo/'
});

Route::middleware(['checkViajero'])->group(function () {
    Route::get('viajero', [ViajeroPanelController::class, 'index']);
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'viajero/'
});

Route::middleware(['checkHotel'])->group(function () {
    Route::get('hotel', [HotelPanelController::class, 'index']);
    // Agrega aquí otras rutas que devuelvan vistas dentro de la carpeta 'hotel/'
});

// Debería ir un grupo para reservas compartido por checkAdmin y checkViajero y creo que checkHotel
// si es que los tres tienen que tener acceso a sus vistas
// --------------------------------------------------------------------------------

Route::get('/reservas/menu', [menu_reservasController::class, 'index'])->name('reservas.menu');
Route::get('/reservas/listar', [menu_listareservasController::class, 'index'])->name('reservas.listar');
Route::get('/reservas/crear/{valor}', [transfer_crearreservaController::class, 'index'])->name('reservas.crear');
Route::get('/reservas/modificar/{valor}', [transfer_modificarreservaController::class, 'ModificarReserva'])->name('reservas.modificar');
Route::get('/reservas/ver/{valor}', [transfer_verreservaController::class, 'VerReserva'])->name('reservas.ver');
Route::get('/reservas/eliminar/{valor}', [transfer_eliminarreservaController::class, 'EliminarReserva'])->name('reservas.eliminar');




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
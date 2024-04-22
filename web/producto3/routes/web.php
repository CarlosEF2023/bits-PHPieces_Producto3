<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\reservas\transfer_crearreservaController;

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

Route::get('/', HomeController::class);
Route::post('login', [AuthController::class, 'login'])->name('login');

// habra que unificar estas rutas en una sola

Route::get('/administrador', function () {
    return view('administrador.index');
})->name('administrador');

Route::get('/vehiculo', function () {
    return view('administrador.vehiculo');
})->name('vehiculo');

Route::get('/viajero', function () {
    return view('viajero.index');
})->name('viajero');

Route::get('/hotel', function () {
    return view('hotel.index');
})->name('hotel');

Route::get('administrador/adminPanel', [AdminPanelController::class, 'index']);
Route::put('administrador/adminPanel', [AdminPanelController::class, 'index']);

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión con la base de datos exitosa!";
    } catch (\Exception $e) {
        return "Error al conectar con la base de datos: " . $e->getMessage();
    }
});

Route::get('/db-test2', function () {
    $host = 'mysql-db-prdto3';
    $database ='wordpress1';
    $username = 'root';
    $password = 'root';
    $port = 3306;

    $mysqli = new mysqli($host, $username, $password, $database, $port);

    if ($mysqli->connect_error) {
        return "Error al conectar con la base de datos: " . $mysqli->connect_error;
    } else {
        $mysqli->close();
        return "Conexión con la base de datos exitosa!";
    }
});

Route::get('reservas/aeropuerto/crear', 'App\Http\Controllers\reservas\transfer_crearreservaController@CrearReservaAeropuerto');

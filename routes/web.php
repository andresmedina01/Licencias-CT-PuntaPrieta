<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LicenciasController;
use App\Http\Controllers\GraphController;

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

//rutas para mostrar las graficas
Route::get('/', [GraphController::class, 'ShowGraph'])->name('principal')->middleware('auth');

//rutas para registrar al usuario
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// rutas para ingresar a la plataforma
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//rutas para salir de la plataforma
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//rutas para generar licencias
//autenticacion si es jefe de grupo
//"post" almacena la licencia generada en la DB
Route::get('/licencias', [LicenciasController::class, 'show'])->name('licencias')->middleware('auth');
Route::post('/licencias', [LicenciasController::class, 'store']);

//ruta para mostrar licencias en la vista de registro
Route::get('/documentos', [LicenciasController::class, 'showLicences'])->name('documentos')->middleware('auth');

// ruta para mostrar la vista de estado
// ruta para imprimir la licencia
// validaciones correspondiente
Route::get('/status', [LicenciasController::class, 'index'])->name('status')->middleware('auth');
Route::put('/status/{id}/update', [LicenciasController::class, 'update'])->name('status.update')->middleware('auth');

// rutas para obtener la informacion de equipos
// comando de validaciones
Route::get('get-empleados', [LicenciasController::class, 'getEmpleados'])->name('getEmpleados');
Route::get('get-equipos', [LicenciasController::class, 'getEquipos'])->name('getEquipos');

// tura para actualizar cuando una licencia se cierra
Route::get('/status/cerrar/{id}', [LicenciasController::class, 'cerrarLicencia']);

// ruta que efectua la eliminacion de una licencia
Route::delete('/status/eliminar/{id}', [LicenciasController::class, 'destroy']);

// ruta para imprimir una etiqueta de licencia licencia
// activan validaciones correspondientes
Route::get('/status/print/{id}', [LicenciasController::class, 'showLicencia']);

Route::get('/status/editar/{id}', [LicenciasController::class, 'edit'])->name('edit');
Route::put('/status/update/{id}', [LicenciasController::class, 'actualizar'])->name('actualizar');


// ruta para imprimir una licencia completada
Route::get('/documentos/print/{id}', [LicenciasController::class, 'showLicense']);

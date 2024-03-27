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


Route::get('/', [GraphController::class, 'ShowGraph'])->name('principal')->middleware('auth');


Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/licencias', [LicenciasController::class, 'show'])->name('licencias')->middleware('auth');
Route::post('/licencias', [LicenciasController::class, 'store']);

Route::get('/documentos', [LicenciasController::class, 'showLicences'])->name('documentos')->middleware('auth');

Route::get('/status', [LicenciasController::class, 'index'])->name('status')->middleware('auth');
Route::put('/status/{id}/update', [LicenciasController::class, 'update'])->name('status.update')->middleware('auth');

Route::get('get-empleados', [LicenciasController::class, 'getEmpleados'])->name('getEmpleados');
Route::get('get-equipos', [LicenciasController::class, 'getEquipos'])->name('getEquipos');

Route::get('/status/liberar/{id}', [LicenciasController::class, 'LiberarLicencia']);

Route::delete('/status/eliminar/{id}', [LicenciasController::class, 'destroy']);


Route::get('/status/print/{id}', [LicenciasController::class, 'showLicencia']);

Route::get('/documentos/print/{id}', [LicenciasController::class, 'showLicense']);

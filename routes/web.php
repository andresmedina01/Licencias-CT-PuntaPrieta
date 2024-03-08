<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\LicenciasController;

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

Route::get('/', function () {
    return view('panel.principal');
})->name('principal')->middleware('auth');

Route::view('/registros', 'panel.registros')->name('registros');
Route::view('/status', 'panel.status')->name('status');

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/licencias', [LicenciasController::class, 'show'])->name('licencias')->middleware('auth');
Route::post('/licencias', [LicenciasController::class, 'store']);

Route::get('/documentos', function () {
    return view('panel.documentos.index');
})->name('documentos')->middleware('auth');

Route::get('get-empleados', [LicenciasController::class, 'getEmpleados'])->name('getEmpleados');
Route::get('get-equipos', [LicenciasController::class, 'getEquipos'])->name('getEquipos');

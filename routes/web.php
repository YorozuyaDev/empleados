<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::resource('puestos',PuestoController::class);
Route::resource('empleados',EmpleadoController::class);
Route::resource('departamentos',DepartamentoController::class);

/*Controlador suelto
Route::get('url',[PuestoController::class,'create'])->name('nombre routelist';
*/
<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('welcome');

Route::view('/home','home')->name('home');

Route::view('/alquileres','alquileres')->name('alquileres');

Route::view('/personas','personas')->name('personas');

Route::view('/liquidaciones','liquidaciones')->name('liquidaciones');

Route::view('/notificaciones','notificaciones')->name('notificaciones');




// Esto es para crear la ruta blade que va a usar tabulator para llamar al controlador de la tabla.
// 1. Importás tu controlador en la parte superior del archivo
use App\Http\Controllers\ContratoController;

// 2. Creás la ruta específica para los datos
Route::get('/api/contratos-datos', [ContratoController::class, 'getDatosParaTabulator'])->name('api.contratos.datos');




// 1. Importás tu controlador en la parte superior del archivo
use App\Http\Controllers\InmuebleController;

// 2. Creás la ruta específica para los datos
Route::get('/api/inmuebles-datos', [InmuebleController::class, 'getDatosParaTabulator'])->name('api.inmueble.datos');



// 1. Importás tu controlador en la parte superior del archivo
use App\Http\Controllers\PersonaController;

// 2. Creás la ruta específica para los datos
Route::get('/api/personas-datos', [PersonaController::class, 'getDatosParaTabulator'])->name('api.persona.datos');
// Esta es la ruta para los formularios de Personas
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.crud');



use App\Http\Controllers\LiquidacionController;
Route::get('/api/liquidaciones-datos', [LiquidacionController::class, 'getDatosParaTabulator'])->name('api.liquidacion.datos');



use App\Http\Controllers\ReparacionController;
Route::get('/api/reparaciones-datos', [ReparacionController::class, 'getDatosParaTabulator'])->name('api.reparacion.datos');





//Esta es la ruta para los formularios de Reparaciones
// Esta es la ruta que atiende cuando entras a /reparaciones
Route::get('/reparaciones', [ReparacionController::class, 'index'])->name('reparaciones');

// Y tu ruta POST para guardar/procesar:
Route::post('/reparaciones', [ReparacionController::class, 'store'])->name('reparaciones.crud');

//Esta es la ruta para los formularios de Contratos
// Esta es la ruta que atiende cuando entras a /contratos
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos');

// Y tu ruta POST para guardar/procesar:
Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.crud');

//Esta es la ruta para los formularios de Inmuebles
// Esta es la ruta que atiende cuando entras a /inmuebles
Route::get('/inmuebles', [InmuebleController::class, 'index'])->name('inmuebles');

// Y tu ruta POST para guardar/procesar:
Route::post('/inmuebles', [InmuebleController::class, 'store'])->name('inmuebles.crud');
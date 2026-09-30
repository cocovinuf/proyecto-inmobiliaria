<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('welcome');

Route::view('/home','home')->name('home');

Route::view('/inmuebles','inmuebles')->name('inmuebles');

Route::view('/personas','personas')->name('personas');

Route::view('/contratos','contratos')->name('contratos');

Route::view('/liquidaciones','liquidaciones')->name('liquidaciones');

Route::view('/reparaciones','reparaciones')->name('reparaciones');

Route::view('/notificaciones','notificaciones')->name('notificaciones');


// Esto es para crear la ruta blade que va a usar tabulator para llamar al controlador de la tabla.
// 1. Importás tu controlador en la parte superior del archivo
use App\Http\Controllers\ContratoController;

// 2. Creás la ruta específica para los datos
Route::get('/api/contratos-datos', [ContratoController::class, 'getDatosParaTabulator'])->name('api.contratos.datos');
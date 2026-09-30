<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('welcome');

Route::view('/home','home')->name('home');

Route::view('/inmuebles','inmuebles')->name('inmuebles');

Route::view('/personas','personas')->name('personas');

Route::view('/contratos','contratos')->name('contratos');

Route::view('/liquidaciones','liquidaciones')->name('liquidaciones');

Route::view('/reparaciones','reparaciones')->name('reparaciones');

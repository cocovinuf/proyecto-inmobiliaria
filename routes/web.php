<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('welcome');

Route::view('/home','home')->name('home');

Route::view('/propiedades','propiedades')->name('propiedades');

Route::view('/propietarios','propietarios')->name('propietarios');

Route::view('/inquilinos','inquilinos')->name('inquilinos');

Route::view('/contratos','contratos')->name('contratos');


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble; // Es fundamental importar el modelo que vas a usar

class InmuebleController extends Controller
{
    // Este es el método al que va a apuntar la propiedad ajaxURL de tu script JS
    public function getDatosParaTabulator()
    {
        // Trae todos los contratos de la base de datos
        $inmuebles = Inmueble::all(); 
        
        // Los devuelve en formato JSON puro
        return response()->json($inmuebles); 
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona; // Es fundamental importar el modelo que vas a usar

class PersonaController extends Controller
{
    // Este es el método al que va a apuntar la propiedad ajaxURL de tu script JS
    public function getDatosParaTabulator()
    {
        // Trae todos los contratos de la base de datos
        $personas = Persona::all(); 
        
        // Los devuelve en formato JSON puro
        return response()->json($personas); 
    }
}
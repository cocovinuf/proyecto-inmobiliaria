<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;

class ReparacionController extends Controller
{
    public function getDatosParaTabulator()
    {
        // Traemos todas las reparaciones incluyendo la relación con el Inmueble
        $reparaciones = Reparacion::with('inmueble')->get(); 
        
        return response()->json($reparaciones); 
    }
}
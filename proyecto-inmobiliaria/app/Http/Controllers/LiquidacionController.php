<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liquidacion; // Importamos el modelo

class LiquidacionController extends Controller
{
    public function getDatosParaTabulator()
    {
        // Traemos todas las liquidaciones
        $liquidaciones = Liquidacion::all();
        
        return response()->json($liquidaciones);
    }
}
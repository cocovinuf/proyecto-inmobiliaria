<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;

class InmuebleController extends Controller
{
    public function getDatosParaTabulator()
    {
        $inmuebles = Inmueble::with('propietario')->get();

        $datosTransformados = $inmuebles->map(function ($inmueble) {
            
            // Variables individuales del inmueble
            $id = $inmueble->id;
            $alias = $inmueble->alias;
            $tipo = $inmueble->tipo;
            $nombreEdificio = $inmueble->nombre_edificio;
            $calle = $inmueble->calle;
            $numeracion = $inmueble->numeracion;
            $piso = $inmueble->piso;
            $departamento = $inmueble->departamento;
            $unidadFuncional = $inmueble->unidad_funcional;
            $superficie = $inmueble->superficie;
            $cantidadAmbientes = $inmueble->cantidad_ambientes;
            $cantidadDormitorios = $inmueble->cantidad_dormitorios;
            $cantidadBanios = $inmueble->cantidad_banios;
            $cochera = $inmueble->cochera;

            // Variables individuales del propietario
            $propietarioNombre = $inmueble->propietario->nombre ?? null;
            $propietarioApellido = $inmueble->propietario->apellido ?? null;
            $propietarioDni = $inmueble->propietario->dni ?? null;

            $nombre_completo_propietario = $propietarioApellido . " " . $propietarioNombre;

            return [
                'id' => $id,
                'alias' => $alias,
                'tipo' => $tipo,
                'nombre_edificio' => $nombreEdificio,
                'calle' => $calle,
                'numeracion' => $numeracion,
                'piso' => $piso,
                'departamento' => $departamento,
                'unidad_funcional' => $unidadFuncional,
                'superficie' => $superficie,
                'cantidad_ambientes' => $cantidadAmbientes,
                'cantidad_dormitorios' => $cantidadDormitorios,
                'cantidad_banios' => $cantidadBanios,
                'cochera' => $cochera,
                'propietario' => $nombre_completo_propietario,
                'propietario_dni' => $propietarioDni,
            ];
        });

        return response()->json($datosTransformados);
    }
}
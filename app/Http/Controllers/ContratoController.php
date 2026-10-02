<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Carbon\Carbon; //Libreria para manejar fechas de laravel

class ContratoController extends Controller
{
    public function getDatosParaTabulator()
    {
        $contratos = Contrato::with(['inmueble', 'inquilinos', 'garantes'])->get();

        $datosTransformados = $contratos->map(function ($contrato) {
            
            // 1. Variables individuales del contrato
            $id = $contrato->id;
            $alias = $contrato->alias;
            $fechaInicio = $contrato->fecha_inicio;
            $fechaFin = $contrato->fecha_finalizacion;
            $montoInicial = $contrato->monto_inicial;
            $montoActual = $contrato->monto_actual;
            $periodo = $contrato->periodo_actualizacion;
            $indice = $contrato->indice_actualizacion;
            $estado = $contrato->estado;

            // 2. Variables individuales del inmueble
            $inmuebleId = $contrato->inmueble->id;
            $inmuebleAlias = $contrato->inmueble->alias;
            $inmuebleTipo = $contrato->inmueble->tipo;
            $inmuebleCalle = $contrato->inmueble->calle;
            $inmuebleNumeracion = $contrato->inmueble->numeracion;


            // 3. Variables individuales del propietario (dueño del inmueble)
            $propietarioId = $contrato->inmueble->propietario->id ?? null;
            $propietarioNombre = $contrato->inmueble->propietario->nombre ?? null;
            $propietarioApellido = $contrato->inmueble->propietario->apellido ?? null;
            $propietarioDni = $contrato->inmueble->propietario->dni ?? null;

            // 4. Variables procesadas para inquilinos y garantes
            $inquilinosTexto = $contrato->inquilinos->map(fn($i) => "{$i->apellido}, {$i->nombre}")->implode(' - ');
            $garantesTexto = $contrato->garantes->map(fn($g) => "{$g->apellido}, {$g->nombre}")->implode(' - ');







            // LOGICA PARA ARMAR EL ARRAY

            $nombre_completo_propietario = $propietarioApellido . " " . $propietarioNombre;






            
            // 4. Retorno del array final para Tabulator usando esas variables
            return [
                'id' => $id,
                'alias' => $alias,
                'propietario' => $nombre_completo_propietario,
                'fecha_inicio' => Carbon::parse($contrato->fecha_inicio)->format('d-m-Y'),
                'fecha_finalizacion' => Carbon::parse($contrato->fecha_fin)->format('d-m-Y'),
                'monto_inicial' => $montoInicial,
                'monto_actual' => $montoActual,
                'periodo_actualizacion' => $periodo,
                'indice_actualizacion' => $indice,
                'estado' => $estado,
                'inmueble_alias' => $inmuebleAlias,
                'inmueble_tipo' => $inmuebleTipo,
                'inmueble_calle' => $inmuebleCalle,
                'inmueble_numeracion' => $inmuebleNumeracion,
                'inquilinos_texto' => $inquilinosTexto,
                'garantes_texto' => $garantesTexto,
            ];
        });

        return response()->json($datosTransformados);
    }
}
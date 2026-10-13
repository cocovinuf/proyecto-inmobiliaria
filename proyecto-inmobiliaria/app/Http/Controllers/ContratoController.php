<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Inmueble;
use App\Models\Persona;
use Carbon\Carbon; //Libreria para manejar fechas de laravel

class ContratoController extends Controller
{
    public function getDatosParaTabulator()
    {
        $contratos = Contrato::with(['inmueble.propietario', 'inquilinos', 'garantes'])->get();

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

            // 2. Variables individuales del inmueble (con null seguro)
            $inmuebleId = $contrato->inmueble->id ?? null;
            $inmuebleAlias = $contrato->inmueble->alias ?? null;
            $inmuebleTipo = $contrato->inmueble->tipo ?? null;
            $inmuebleCalle = $contrato->inmueble->calle ?? null;
            $inmuebleNumeracion = $contrato->inmueble->numeracion ?? null;


            // 3. Variables individuales del propietario (dueño del inmueble)
            $propietarioId = $contrato->inmueble->propietario->id ?? null;
            $propietarioNombre = $contrato->inmueble->propietario->nombre ?? null;
            $propietarioApellido = $contrato->inmueble->propietario->apellido ?? null;
            $propietarioDni = $contrato->inmueble->propietario->dni ?? null;

            // 4. Variables procesadas para inquilinos y garantes
            $inquilinosTexto = $contrato->inquilinos->map(fn($i) => "{$i->apellido}, {$i->nombre}")->implode(' - ');
            $garantesTexto = $contrato->garantes->map(fn($g) => "{$g->apellido}, {$g->nombre}")->implode(' - ');
            $inquilinosIds = $contrato->inquilinos->pluck('id')->values()->all();
            $garantesIds = $contrato->garantes->pluck('id')->values()->all();






            // LOGICA PARA ARMAR EL ARRAY

            $nombre_completo_propietario = trim($propietarioApellido . " " . $propietarioNombre);





            // 4. Retorno del array final para Tabulator usando esas variables
            return [
                'id' => $id,
                'alias' => $alias,
                'propietario' => $nombre_completo_propietario,
                'fecha_inicio' => $fechaInicio ? Carbon::parse($fechaInicio)->format('d-m-Y') : null,
                'fecha_finalizacion' => $fechaFin ? Carbon::parse($fechaFin)->format('d-m-Y') : null,
                // Valores crudos en Y-m-d para precargar los <input type="date"> del editar
                'fecha_inicio_raw' => $fechaInicio ? Carbon::parse($fechaInicio)->format('Y-m-d') : null,
                'fecha_finalizacion_raw' => $fechaFin ? Carbon::parse($fechaFin)->format('Y-m-d') : null,
                'monto_inicial' => $montoInicial,
                'monto_actual' => $montoActual,
                'periodo_actualizacion' => $periodo,
                'indice_actualizacion' => $indice,
                'estado' => $estado,
                'inmueble_id' => $inmuebleId,
                'inmueble_alias' => $inmuebleAlias,
                'inmueble_tipo' => $inmuebleTipo,
                'inmueble_calle' => $inmuebleCalle,
                'inmueble_numeracion' => $inmuebleNumeracion,
                'inquilinos_texto' => $inquilinosTexto,
                'garantes_texto' => $garantesTexto,
                'inquilinos_ids' => $inquilinosIds,
                'garantes_ids' => $garantesIds,
            ];
        });

        return response()->json($datosTransformados);
    }

    public function index()
    {
        // Obtenemos inmuebles y personas para los selects de los formularios
        $inmuebles = Inmueble::all();
        $personas = Persona::all();

        // Las enviamos a la vista
        return view('contratos', compact('inmuebles', 'personas'));
    }

    // La funcion que va a ejecutar la funcion de guardar el formulario en la db
    public function store(Request $request)
    {
        // 1. Sacamos lo que no es columna directa: _token, accion, id y pivotes
        $data = $request->except(['_token', 'accion', 'id', 'inquilinos', 'garantes']);

        if ($request->input('accion') == 'crear') {
            $contrato = Contrato::create($data);
            // Sincronizamos las listas N-M (si no viene nada, queda vacia)
            $contrato->inquilinos()->sync($request->input('inquilinos', []));
            $contrato->garantes()->sync($request->input('garantes', []));
            return redirect()->back()->with('success', 'Contrato creado con éxito');
        } elseif ($request->input('accion') == 'editar') {
            $contrato = Contrato::findOrFail($request->input('id'));
            $contrato->update($data);
            $contrato->inquilinos()->sync($request->input('inquilinos', []));
            $contrato->garantes()->sync($request->input('garantes', []));
            return redirect()->back()->with('success', 'Contrato actualizado correctamente.');
        } elseif ($request->input('accion') == 'eliminar') {
            $contrato = Contrato::findOrFail($request->input('id'));
            $contrato->delete();
            return redirect()->back()->with('success', 'Contrato eliminado correctamente.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Inmueble;
use Carbon\Carbon; //Libreria para manejar fechas de laravel

class ReparacionController extends Controller
{
    public function getDatosParaTabulator()
    {
        // Traemos todas las reparaciones incluyendo la relación con el Inmueble
        $reparaciones = Reparacion::with('inmueble')->get();

        $datosTransformados = $reparaciones->map(function ($reparacion) {

            // Variables individuales de la reparacion
            $id = $reparacion->id;
            $inmuebleId = $reparacion->inmueble_id;
            $descripcion = $reparacion->descripcion;
            $fechaInicio = $reparacion->fecha_inicio;
            $fechaFin = $reparacion->fecha_finalizacion;
            $monto = $reparacion->monto;
            $comprobante = $reparacion->comprobante;

            // Variables individuales del inmueble (con null seguro)
            $inmuebleAlias = $reparacion->inmueble->alias ?? null;
            $inmuebleTipo = $reparacion->inmueble->tipo ?? null;
            $inmuebleCalle = $reparacion->inmueble->calle ?? null;
            $inmuebleNumeracion = $reparacion->inmueble->numeracion ?? null;

            return [
                'id' => $id,
                'inmueble_id' => $inmuebleId,
                'inmueble_alias' => $inmuebleAlias,
                'inmueble_tipo' => $inmuebleTipo,
                'inmueble_calle' => $inmuebleCalle,
                'inmueble_numeracion' => $inmuebleNumeracion,
                'descripcion' => $descripcion,
                'fecha_inicio' => $fechaInicio ? Carbon::parse($fechaInicio)->format('d-m-Y') : null,
                'fecha_finalizacion' => $fechaFin ? Carbon::parse($fechaFin)->format('d-m-Y') : null,
                // Valores crudos en Y-m-d para precargar los <input type="date"> del editar
                'fecha_inicio_raw' => $fechaInicio ? Carbon::parse($fechaInicio)->format('Y-m-d') : null,
                'fecha_finalizacion_raw' => $fechaFin ? Carbon::parse($fechaFin)->format('Y-m-d') : null,
                'monto' => $monto,
                'comprobante' => $comprobante,
            ];
        });

        return response()->json($datosTransformados);
    }

    public function index()
    {
        // Obtenemos todos los inmuebles de la base de datos para el select del formulario
        $inmuebles = Inmueble::all();

        // Los enviamos a la vista
        return view('reparaciones', compact('inmuebles'));
    }

    // La funcion que va a ejecutar la funcion de guardar el formulario en la db
    public function store(Request $request)
    {
        // 1. Sacamos lo que no es columna: _token, accion, id
        $data = $request->except(['_token', 'accion', 'id']);

        if ($request->input('accion') == 'crear') {
            Reparacion::create($data);
            return redirect()->back()->with('success', 'Reparación creada con éxito');
        } elseif ($request->input('accion') == 'editar') {
            $reparacion = Reparacion::findOrFail($request->input('id'));
            $reparacion->update($data);
            return redirect()->back()->with('success', 'Reparación actualizada correctamente.');
        } elseif ($request->input('accion') == 'eliminar') {
            $reparacion = Reparacion::findOrFail($request->input('id'));
            $reparacion->delete();
            return redirect()->back()->with('success', 'Reparación eliminada correctamente.');
        }
    }
}

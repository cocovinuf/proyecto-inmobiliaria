<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Persona;

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



    public function index()
    {
        // Obtenemos todas las personas de la base de datos
        $personas = Persona::all(); 


        // "Compact" personas Es una función de PHP que empaqueta la variable $personas (la que acabas de consultar con Eloquent) en un array asociativo para que esté disponible y puedas usarla dentro de tu archivo HTML/Blade.

        // Las enviamos a la vista
        return view('inmuebles', compact('personas')); 
        
    }




    // La funcion que va a ejecutar la funcion de guardar el formulario en la db
    public function store(Request $request)
    {

        if( $request->input('accion') == 'crear') {
            // Valida y guarda todo lo que viene de los 'name' del formulario
            Inmueble::create($request->all());

            // Redirige de vuelta a la tabla con un mensaje o respuesta
            return redirect()->back()->with('success', 'Inmueble creado con éxito');
        }elseif( $request->input('accion') == 'editar') {

            // 1. Buscamos a la persona por su ID (si no la encuentra, lanza un error 404 automáticamente)
            $inmueble = Inmueble::findOrFail($request->input('id'));
            
            // 2. Actualizamos los datos con todo lo que viene del formulario
            $inmueble->update($request->all());

            // 3. Redirigimos de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Inmueble actualizado correctamente.');

        }elseif( $request->input('accion') == 'eliminar') {

            // 1. Buscamos a la persona por su ID (si no la encuentra, lanza un error 404 automáticamente)
            $inmueble = Inmueble::findOrFail($request->input('id'));
            
            // 2. Eliminamos el registro
            $inmueble->delete();

            // 3. Redirigimos de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Inmueble eliminado correctamente.');
        }

    }







}
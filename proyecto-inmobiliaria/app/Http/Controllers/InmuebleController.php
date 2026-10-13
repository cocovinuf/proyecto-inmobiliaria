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
            $propietarioId = $inmueble->propietario->id ?? null;

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
                'propietario_id' => $propietarioId,
                'propietario_dni' => $propietarioDni,
                'quincho' => $inmueble->quincho,
                'parrilla' => $inmueble->parrilla,
                'sum' => $inmueble->sum,
                'piscina' => $inmueble->piscina,
                'gimnasio' => $inmueble->gimnasio,
                'solarium' => $inmueble->solarium,
                'vigilancia' => $inmueble->vigilancia,
                'jardin' => $inmueble->jardin,
                'lavanderia' => $inmueble->lavanderia,
                'terraza' => $inmueble->terraza,
                'cancha_de_deportes' => $inmueble->cancha_de_deportes,
                'sauna' => $inmueble->sauna,
                'sala_de_reuniones' => $inmueble->sala_de_reuniones,
                'lockers_de_paqueteria' => $inmueble->lockers_de_paqueteria,
                'espacio_coworking' => $inmueble->espacio_coworking,
                'sala_de_juegos' => $inmueble->sala_de_juegos,

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
    $amenities = [
        'quincho', 'parrilla', 'sum', 'piscina', 'gimnasio', 'solarium',
        'vigilancia', 'jardin', 'lavanderia', 'terraza', 'cancha_de_deportes',
        'sauna', 'sala_de_reuniones', 'lockers_de_paqueteria', 'espacio_coworking', 'sala_de_juegos'
    ];

    // 1. Sacamos lo que no es columna: _token, accion, id
    $data = $request->except(['_token', 'accion', 'id']);

    // 2. Normalizamos: tildado=1, no venido=0
    foreach ($amenities as $amenity) {
        $data[$amenity] = $request->has($amenity) ? 1 : 0;
    }

    if ($request->input('accion') == 'crear') {
        Inmueble::create($data);
        return redirect()->back()->with('success', 'Inmueble creado con éxito');
    } elseif ($request->input('accion') == 'editar') {
        $inmueble = Inmueble::findOrFail($request->input('id'));
        $inmueble->update($data);
        return redirect()->back()->with('success', 'Inmueble actualizado correctamente.');
    } elseif ($request->input('accion') == 'eliminar') {
        $inmueble = Inmueble::findOrFail($request->input('id'));
        $inmueble->delete();
        return redirect()->back()->with('success', 'Inmueble eliminado correctamente.');
    }
}







}
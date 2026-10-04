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


    // La funcion que va a ejecutar la funcion de guardar el formulario en la db
    public function store(Request $request)
    {

        if( $request->input('accion') == 'crear') {
            // Valida y guarda todo lo que viene de los 'name' del formulario
            Persona::create($request->all());

            // Redirige de vuelta a la tabla con un mensaje o respuesta
            return redirect()->back()->with('success', 'Persona creada con éxito');
        }elseif( $request->input('accion') == 'editar') {

            // 1. Buscamos a la persona por su ID (si no la encuentra, lanza un error 404 automáticamente)
            $persona = Persona::findOrFail($request->input('id'));
            
            // 2. Actualizamos los datos con todo lo que viene del formulario
            $persona->update($request->all());

            // 3. Redirigimos de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Persona actualizada correctamente.');

        }elseif( $request->input('accion') == 'eliminar') {

            // 1. Buscamos a la persona por su ID (si no la encuentra, lanza un error 404 automáticamente)
            $persona = Persona::findOrFail($request->input('id'));
            
            // 2. Eliminamos el registro
            $persona->delete();

            // 3. Redirigimos de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Persona eliminada correctamente.');
        }

    }



}
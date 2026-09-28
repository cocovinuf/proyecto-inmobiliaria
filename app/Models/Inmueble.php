<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';

    protected $fillable = [
        'propietario_id',
        'alias',
        'tipo',
        'nombre_edificio',
        'calle',
        'numeracion',
        'piso',
        'departamento',
        'unidad_funcional',
        'superficie',
        'cantidad_ambientes',
        'cantidad_dormitorios',
        'cantidad_banios',
        'quincho',
        'parrilla',
        'sum',
        'piscina',
        'gimnasio',
        'solarium',
        'vigilancia',
        'jardin',
        'lavanderia',
        'terraza',
        'cancha_de_deportes',
        'sauna',
        'sala_de_reuniones',
        'lockers_de_paqueteria',
        'espacio_coworking',
        'sala_de_juegos',
    ];

    // Relación: Un inmueble pertenece a un propietario (Persona)
    public function propietario()
    {
        return $this->belongsTo(Persona::class, 'propietario_id');
    }

    // NUEVA RELACIÓN: Un inmueble tiene muchas reparaciones
    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class, 'inmueble_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // Le indicamos explícitamente a Laravel que use la tabla 'personas'
    protected $table = 'personas';

    protected $fillable = [
        'apellido',
        'nombre',
        'dni',
        'cuit',
        'cuil',
        'num_telefono',
        'num_cuenta_bancaria',
        'cbu',
        'nombre_banco',
        'titular_cuenta',
        'documentacion',
    ];
}
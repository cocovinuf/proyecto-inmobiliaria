<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    // Le decimos a Laravel el nombre exacto de la tabla
    protected $table = 'reparaciones';

    protected $fillable = [
        'inmueble_id',
        'descripcion',
        'fecha_inicio',
        'fecha_finalizacion',
        'monto',
        'comprobante',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_finalizacion' => 'date',
    ];

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }
}
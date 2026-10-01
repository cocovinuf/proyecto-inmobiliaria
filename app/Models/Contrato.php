<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'inmueble_id',
        'fecha_inicio',
        'fecha_finalizacion',
        'monto_inicial',
        'monto_actual',
        'periodo_actualizacion',
        'indice_actualizacion',
        "estado",
        
    ];

    // Convertimos los campos en objetos de fecha automáticamente
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_finalizacion' => 'date',
    ];

    // Relación: Un contrato pertenece a un Inmueble
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }

    // Relación Muchos a Muchos: Un contrato tiene una lista de Inquilinos
    public function inquilinos()
    {
        return $this->belongsToMany(Persona::class, 'contrato_inquilino', 'contrato_id', 'persona_id');
    }

    // Relación Muchos a Muchos: Un contrato tiene una lista de Garantes
    public function garantes()
    {
        return $this->belongsToMany(Persona::class, 'contrato_garante', 'contrato_id', 'persona_id');
    }
}
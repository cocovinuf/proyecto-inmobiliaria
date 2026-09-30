<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    // Fuerza a Laravel a usar este nombre exacto para la tabla
    protected $table = 'notificaciones';

    protected $fillable = [
        'usuario_id',
        'contrato_id',
        'mensaje',
        'leida_en',
    ];

    protected $casts = [
        'leida_en' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
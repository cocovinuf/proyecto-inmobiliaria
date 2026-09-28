<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    use HasFactory;

    protected $table = 'liquidaciones';

    protected $fillable = [
        'contrato_id',
        'monto_alquiler',
        'monto_expensa',
        'pagado',
        'rendido',
    ];

    // Convertimos los campos en objetos de fecha automáticamente
    protected $casts = [
        'pagado' => 'date',
        'rendido' => 'date',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
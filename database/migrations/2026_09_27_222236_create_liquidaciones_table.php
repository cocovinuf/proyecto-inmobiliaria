<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->id(); // Representa id_liquidacion
            
            // Relación 1 a M con Contratos
            $table->foreignId('contrato_id')->constrained('contratos');
            
            // Periodo de la liquidación (ej. '2026-10' u 'Octubre 2026')
            $table->string('periodo', 50); 
            
            // Montos (usando decimal para evitar errores de redondeo con dinero)
            $table->decimal('monto_alquiler', 12, 2);
            $table->decimal('monto_expensa', 12, 2);
            
            // Fechas de estado (pueden ser nulas al momento de emitir la liquidación)
            $table->date('pagado')->nullable();
            $table->date('rendido')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidaciones');
    }
};
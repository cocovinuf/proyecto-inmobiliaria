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
        // 1. Tabla principal de Contratos
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            
            // Relación 1 a M con Inmuebles
            $table->foreignId('inmueble_id')->constrained('inmuebles');
            
            // Datos del contrato
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->decimal('monto_inicial', 12, 2); // Usamos decimal en vez de float para dinero
            $table->decimal('monto_actual', 12, 2);  // NUEVO CAMPO: Registra las actualizaciones del arancel
            $table->string('periodo_actualizacion');
            $table->string('indice_actualizacion');
            $table->integer('duracion');
            
            $table->timestamps();
        });

        // 2. Tabla intermedia para la lista de Inquilinos (Muchos a Muchos)
        Schema::create('contrato_inquilino', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained('contratos')->onDelete('cascade');
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->timestamps();
        });

        // 3. Tabla intermedia para la lista de Garantes (Muchos a Muchos)
        Schema::create('contrato_garante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained('contratos')->onDelete('cascade');
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // El orden al borrar debe ser inverso para no romper las claves foráneas
        Schema::dropIfExists('contrato_garante');
        Schema::dropIfExists('contrato_inquilino');
        Schema::dropIfExists('contratos');
    }
};
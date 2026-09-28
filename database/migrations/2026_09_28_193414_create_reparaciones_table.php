<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmueble_id')->constrained('inmuebles')->onDelete('cascade');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion')->nullable();
            $table->decimal('monto', 12, 2);
            $table->string('comprobante')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};
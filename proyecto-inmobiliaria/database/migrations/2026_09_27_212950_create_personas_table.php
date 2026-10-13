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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('dni');
            $table->string('cuit') ->nullable();
            $table->string('cuil') ->nullable();
            $table->string('num_telefono') ->nullable();
            $table->string('num_cuenta_bancaria') ->nullable();
            $table->string('cbu') ->nullable();
            $table->string('nombre_banco') ->nullable();
            $table->string('titular_cuenta') ->nullable();
            $table->text('documentacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

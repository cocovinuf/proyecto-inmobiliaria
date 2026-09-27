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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id(); // Representa el id_inmueble
            
            // Relación 1 a M con la tabla personas (El propietario)
            $table->foreignId('propietario_id')->constrained('personas');

            // Datos principales[cite: 2]
            $table->string('alias');
            $table->string('tipo');
            $table->string('nombre_edificio')->nullable();
            $table->string('calle');
            $table->integer('numeracion');
            $table->integer('piso')->nullable();
            $table->string('departamento')->nullable();
            $table->string('unidad_funcional')->nullable();
            $table->string('superficie');
            $table->integer('cantidad_ambientes');
            $table->integer('cantidad_dormitorios');
            $table->integer('cantidad_banios');

            // Comodidades (Amenities) - Convertidas a booleanos con "false" por defecto[cite: 2]
            $table->boolean('quincho')->default(false);
            $table->boolean('parrilla')->default(false);
            $table->boolean('sum')->default(false);
            $table->boolean('piscina')->default(false);
            $table->boolean('gimnasio')->default(false);
            $table->boolean('solarium')->default(false);
            $table->boolean('vigilancia')->default(false);
            $table->boolean('jardin')->default(false);
            $table->boolean('lavanderia')->default(false);
            $table->boolean('terraza')->default(false);
            $table->boolean('cancha_de_deportes')->default(false);
            $table->boolean('sauna')->default(false);
            $table->boolean('sala_de_reuniones')->default(false);
            $table->boolean('lockers_de_paqueteria')->default(false);
            $table->boolean('espacio_coworking')->default(false);
            $table->boolean('sala_de_juegos')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
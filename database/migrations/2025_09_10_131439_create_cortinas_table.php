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
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();

            // Relación con aula
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');

            // Datos de la cortina
            $table->string('tipo')->nullable();       // Ej: roller, blackout, traslúcida
            $table->string('material')->nullable();   // Ej: tela, pvc, madera

            // Estado textual (para poder guardar "Cerrada" o "Abierta")
            $table->string('estado')->default('Cerrada');  

            $table->text('descripcion')->nullable();  // Detalles adicionales

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortinas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear la tabla historial_focos
     */
    public function up(): void
    {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained('focos')->onDelete('cascade');
            $table->enum('accion', ['encendido', 'apagado']); // Estado del foco
            $table->date('fecha'); // 👈 ESTA COLUMNA ERA LA QUE FALTABA
            $table->string('responsable')->nullable(); // Persona responsable del cambio
            $table->timestamps(); // created_at / updated_at
        });
    }

    /**
     * Eliminar la tabla historial_focos
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_focos');
    }
};

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
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('dia_semana'); // 1 = lunes, 7 = domingo
            $table->time('hora_inicio');
            $table->time('hora_fin');

            // Relación con docente (puedes cambiar si es para otro modelo)
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');

            $table->timestamps();

            $table->unique(['docente_id', 'dia_semana', 'hora_inicio', 'hora_fin'], 'disponibilidad_unica');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidades');
    }
};

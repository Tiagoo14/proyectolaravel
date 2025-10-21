<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();

            // FK compatible con aulas.id
            $table->foreignId('aula_id')
                  ->constrained('aulas')
                  ->onDelete('cascade');

            $table->enum('dia', [
                'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'
            ]);

            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};

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
        Schema::create('focos', function (Blueprint $table) {
            $table->id();

            // Relación con aula
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');

            $table->string('tipo')->nullable(); // Ej: LED, halógeno, fluorescente
            $table->integer('potencia')->nullable(); // potencia en watts
            $table->boolean('estado')->default(true); // true = encendido, false = apagado

            $table->string('ubicacion')->nullable(); // opcional, dónde está ubicado el foco en el aula
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focos');
    }
};

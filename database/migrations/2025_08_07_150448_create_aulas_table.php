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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');           // Ubicación física del aula (ej. "Edificio A, Piso 2")
            $table->integer('capacidad');          // Número máximo de personas que caben
            $table->string('estado')->default('disponible'); // Estado: disponible, mantenimiento, ocupada, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
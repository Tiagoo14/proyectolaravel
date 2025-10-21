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
        Schema::create('muebles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');

            $table->string('tipo');
            $table->integer('cantidad')->default(1);
            $table->string('estado')->default('bueno'); // Ej: bueno, malo, reparación
            $table->text('descripcion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muebles');
    }
};

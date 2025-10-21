<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_uso_aire_acondicionados', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('aire_acondicionado_id');
    $table->enum('accion', ['encender', 'apagar']);
    $table->date('fecha');
    $table->string('responsable')->nullable();
    $table->timestamps();

    $table->foreign('aire_acondicionado_id')
          ->references('id')->on('aire_acondicionados')
          ->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
};

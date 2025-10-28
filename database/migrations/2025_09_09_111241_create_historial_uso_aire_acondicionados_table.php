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

            // 'unsignedBigInteger' coincide perfectamente con 'id()' de la otra tabla
            $table->unsignedBigInteger('aire_acondicionado_id');
            
            $table->enum('accion', ['encender', 'apagar']);
            $table->date('fecha');
            $table->string('responsable')->nullable();
            $table->timestamps();

            // Esta llave foránea ahora SÍ encontrará la tabla 'aire_acondicionados'
            $table->foreign('aire_acondicionado_id')
                  ->references('id')
                  ->on('aire_acondicionados') // Coincide con el Archivo 1
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
};
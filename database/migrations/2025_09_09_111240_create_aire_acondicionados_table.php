<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 👇 CORREGIDO AQUÍ (sin la 'a' extra)
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            // 'id()' crea un UNSIGNED BIGINT
            $table->id();

            // Esto espera una tabla 'aulas' que también tenga 'id()'
            $table->unsignedBigInteger('aula_id'); 
            
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            // Foreign key hacia 'aulas'
            $table->foreign('aula_id')
                  ->references('id')
                  ->on('aulas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // 👇 CORREGIDO AQUÍ
        Schema::dropIfExists('aire_acondicionados');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            // 🔧 Motor InnoDB para soportar claves foráneas
            $table->engine = 'InnoDB';

            // 🔢 id => unsignedBigInteger implícito
            $table->id();

            // 🔗 Relación con aula (asegurate de tener 'aulas' creada antes)
            $table->unsignedBigInteger('aula_id');

            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            // 🔗 Foreign key hacia aulas
            $table->foreign('aula_id')
                  ->references('id')
                  ->on('aulas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aire_acondicionados');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cortina;

class CortinaSeeder extends Seeder
{
    public function run()
    {
        Cortina::create(['aula_id' => 1, 'estado' => 'Abiertaa']);
        Cortina::create(['aula_id' => 2, 'estado' => 'Cerrada']);
        Cortina::create(['aula_id' => 3, 'estado' => 'Abierta']);
    }
}

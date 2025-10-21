<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Foco;

class FocoSeeder extends Seeder
{
    public function run()
    {
        Foco::create(['aula_id' => 1, 'estado' => 'Encendido']);
        Foco::create(['aula_id' => 2, 'estado' => 'Apagado']);
        Foco::create(['aula_id' => 3, 'estado' => 'Encendido']);
    }
}

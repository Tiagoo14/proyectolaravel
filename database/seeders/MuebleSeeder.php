<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mueble;

class MuebleSeeder extends Seeder
{
    public function run()
    {
        Mueble::create(['aula_id' => 1, 'tipo' => 'Pupitre', 'cantidad' => 30]);
        Mueble::create(['aula_id' => 2, 'tipo' => 'Silla', 'cantidad' => 25]);
        Mueble::create(['aula_id' => 3, 'tipo' => 'Mesa', 'cantidad' => 10]);
    }
}

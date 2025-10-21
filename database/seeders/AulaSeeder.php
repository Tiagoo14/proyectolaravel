<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    public function run()
    {
        Aula::create(['nombre' => 'Aula 101', 'capacidad' => 30, 'ubicacion' => 'Planta Baja']);
        Aula::create(['nombre' => 'Aula 102', 'capacidad' => 25, 'ubicacion' => 'Primer Piso']);
        Aula::create(['nombre' => 'Laboratorio 1', 'capacidad' => 20, 'ubicacion' => 'Edificio B']);
    }
}

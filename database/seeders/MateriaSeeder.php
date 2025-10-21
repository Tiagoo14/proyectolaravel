<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    public function run()
    {
        Materia::create(['nombre' => 'Matemática I', 'carrera' => 'Ingeniería', 'tipo_cursada' => 'Presencial', 'anio' => 1]);
        Materia::create(['nombre' => 'Programación I', 'carrera' => 'Informática', 'tipo_cursada' => 'Virtual', 'anio' => 1]);
        Materia::create(['nombre' => 'Física II', 'carrera' => 'Ingeniería', 'tipo_cursada' => 'Presencial', 'anio' => 2]);
    }
}

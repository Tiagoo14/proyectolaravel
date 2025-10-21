<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
    public function run()
    {
        Docente::create(['nombre' => 'Juan Pérez', 'dni' => '30111222', 'especialidad' => 'Matemática']);
        Docente::create(['nombre' => 'Ana Gómez', 'dni' => '28999888', 'especialidad' => 'Programación']);
        Docente::create(['nombre' => 'Luis Martínez', 'dni' => '32777888', 'especialidad' => 'Física']);
    }
}

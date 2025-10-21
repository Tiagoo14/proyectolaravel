<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disponibilidad;

class DisponibilidadSeeder extends Seeder
{
    public function run()
    {
        Disponibilidad::create(['aula_id' => 1, 'fecha' => '2025-08-15', 'hora' => '08:00', 'estado' => 'Libre']);
        Disponibilidad::create(['aula_id' => 2, 'fecha' => '2025-08-15', 'hora' => '10:00', 'estado' => 'Ocupada']);
        Disponibilidad::create(['aula_id' => 3, 'fecha' => '2025-08-15', 'hora' => '14:00', 'estado' => 'Libre']);
    }
}

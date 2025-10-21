<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        Reserva::create(['aula_id' => 1, 'materia_id' => 1, 'fecha' => '2025-08-16', 'hora_inicio' => '08:00', 'hora_fin' => '10:00', 'tipo_origen' => 'Clase']);
        Reserva::create(['aula_id' => 2, 'materia_id' => 2, 'fecha' => '2025-08-16', 'hora_inicio' => '10:00', 'hora_fin' => '12:00', 'tipo_origen' => 'Examen']);
        Reserva::create(['aula_id' => 3, 'materia_id' => 3, 'fecha' => '2025-08-16', 'hora_inicio' => '14:00', 'hora_fin' => '16:00', 'tipo_origen' => 'Clase']);
    }
}

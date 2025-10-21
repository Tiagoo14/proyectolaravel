<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistorialUsoAireAcondicionado;

class HistorialUsoAireAcondicionadoSeeder extends Seeder
{
    public function run()
    {
        HistorialUsoAireAcondicionado::create(['aire_acondicionado_id' => 1, 'aula_id' => 1, 'fecha' => '2025-08-10', 'hora_inicio' => '08:00', 'hora_fin' => '10:00', 'temperatura' => '22°C']);
        HistorialUsoAireAcondicionado::create(['aire_acondicionado_id' => 2, 'aula_id' => 2, 'fecha' => '2025-08-11', 'hora_inicio' => '14:00', 'hora_fin' => '16:00', 'temperatura' => '24°C']);
    }
}

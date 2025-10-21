<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistorialFoco;

class HistorialFocoSeeder extends Seeder
{
    public function run()
    {
        HistorialFoco::create(['foco_id' => 1, 'fecha' => '2025-08-10', 'hora' => '08:05', 'accion' => 'Encendido']);
        HistorialFoco::create(['foco_id' => 2, 'fecha' => '2025-08-10', 'hora' => '10:15', 'accion' => 'Apagado']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AireAcondicionado;

class AireAcondicionadoSeeder extends Seeder
{
    public function run()
    {
        AireAcondicionado::create(['aula_id' => 1, 'marca_modelo' => 'LG Dual Inverter', 'estado' => 'Encendido', 'mantenimiento' => 'OK']);
        AireAcondicionado::create(['aula_id' => 2, 'marca_modelo' => 'Samsung WindFree', 'estado' => 'Apagado', 'mantenimiento' => 'Pendiente']);
    }
}

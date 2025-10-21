<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AulaSeeder::class,
            MateriaSeeder::class,
            DocenteSeeder::class,
            ReservaSeeder::class,
            HorarioSeeder::class,
            DisponibilidadSeeder::class,
            MuebleSeeder::class,
            AireAcondicionadoSeeder::class,
            FocoSeeder::class,
            CortinaSeeder::class,
            AulaMateriaSeeder::class, // si tenés tabla pivot
        ]);
    }
}

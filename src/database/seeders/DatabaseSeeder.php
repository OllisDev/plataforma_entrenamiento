<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CiclistaSeeder::class,
            BicicletaSeeder::class,
            TipoComponenteSeeder::class,
            ComponentesBicicletaSeeder::class,
            PlanEntrenamientoSeeder::class,
            BloqueEntrenamientoSeeder::class,
            SesionEntrenamientoSeeder::class,
            SesionBloqueSeeder::class,
        ]);
    }
}

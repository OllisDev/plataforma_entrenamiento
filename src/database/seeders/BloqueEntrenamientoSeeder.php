<?php

namespace Database\Seeders;

use App\Models\BloqueEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloqueEntrenamientoSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloqueEntrenamiento::factory()->count(5)->create();
    }
}

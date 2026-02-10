<?php

namespace Database\Seeders;

use App\Models\SesionEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesionEntrenamientoSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SesionEntrenamiento::factory()->count(5)->create();
    }
}

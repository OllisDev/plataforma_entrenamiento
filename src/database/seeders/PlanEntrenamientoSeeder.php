<?php

namespace Database\Seeders;

use App\Models\PlanEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanEntrenamientoSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanEntrenamiento::factory()->count(5)->create();
    }
}

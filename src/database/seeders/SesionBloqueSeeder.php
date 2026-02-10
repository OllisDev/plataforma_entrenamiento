<?php

namespace Database\Seeders;

use App\Models\SesionBloque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesionBloqueSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SesionBloque::factory()->count(5)->create();
    }
}

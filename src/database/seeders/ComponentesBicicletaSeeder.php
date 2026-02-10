<?php

namespace Database\Seeders;

use App\Models\ComponentesBicicleta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentesBicicletaSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComponentesBicicleta::factory()->count(5)->create();
    }
}

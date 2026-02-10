<?php

namespace Database\Seeders;

use App\Models\Bicicleta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BicicletaSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bicicleta::factory()->count(5)->create();
    }
}

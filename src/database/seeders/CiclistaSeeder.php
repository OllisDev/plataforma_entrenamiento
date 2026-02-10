<?php

namespace Database\Seeders;

use App\Models\Ciclista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiclistaSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ciclista::factory()->count(5)->create();
    }
}

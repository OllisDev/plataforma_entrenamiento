<?php

namespace Database\Seeders;

use App\Models\TipoComponente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoComponenteSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoComponente::factory()->count(5)->create();
    }
}

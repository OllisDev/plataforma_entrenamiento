<?php

namespace Database\Factories;

use App\Models\TipoComponente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoComponente>
 */
class TipoComponenteFactory extends Factory
{
    protected $model = TipoComponente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->word,
            'descripcion' => $this->faker->sentence,
        ];
    }
}

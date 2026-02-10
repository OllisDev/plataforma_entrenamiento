<?php

namespace Database\Factories;

use App\Models\SesionEntrenamiento;
use App\Models\PlanEntrenamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SesionEntrenamiento>
 */
class SesionEntrenamientoFactory extends Factory
{
    protected $model = SesionEntrenamiento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_plan' => PlanEntrenamiento::factory(),
            'nombre' => $this->faker->words(2, true),
            'descripcion' => $this->faker->sentence,
            'completada' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\PlanEntrenamiento;
use App\Models\Ciclista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanEntrenamiento>
 */
class PlanEntrenamientoFactory extends Factory
{

    protected $model = PlanEntrenamiento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $end = (clone $start)->modify('+1 month');
        return [
            'id_ciclista' => Ciclista::factory(),
            'nombre' => $this->faker->words(3, true),
            'descripcion' => $this->faker->sentence,
            'fecha_inicio' => $start,
            'fecha_fin' => $end,
            'objetivo' => $this->faker->sentence(3),
            'activo' => $this->faker->boolean,
        ];
    }
}

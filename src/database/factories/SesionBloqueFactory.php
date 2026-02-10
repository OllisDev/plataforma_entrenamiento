<?php

namespace Database\Factories;

use App\Models\BloqueEntrenamiento;
use App\Models\SesionBloque;
use App\Models\SesionEntrenamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SesionBloque>
 */
class SesionBloqueFactory extends Factory
{
    protected $model = SesionBloque::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_sesion_entrenamiento' => SesionEntrenamiento::factory(),
            'id_bloque_entrenamiento' => BloqueEntrenamiento::factory(),
            'orden' => $this->faker->numberBetween(1, 10),
            'repeticiones' => $this->faker->numberBetween(1, 5),
        ];
    }
}

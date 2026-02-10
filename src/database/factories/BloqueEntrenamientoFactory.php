<?php

namespace Database\Factories;

use App\Models\BloqueEntrenamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloqueEntrenamiento>
 */
class BloqueEntrenamientoFactory extends Factory
{
    protected $model = BloqueEntrenamiento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = ['rodaje', 'intervalos', 'fuerza', 'recuperacion', 'test'];
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'tipo' => $this->faker->randomElement($tipos),
            'duracion_estimada' => $this->faker->time('H:i:s', '02:00:00'),
            'potencia_pct_min' => $this->faker->randomFloat(2, 40, 60),
            'potencia_pct_max' => $this->faker->randomFloat(2, 61, 100),
            'pulso_pct_max' => $this->faker->randomFloat(2, 60, 100),
            'pulso_reserva_pct' => $this->faker->randomFloat(2, 60, 100),
            'comentario' => $this->faker->sentence,
        ];
    }
}

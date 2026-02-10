<?php

namespace Database\Factories;

use App\Models\Bicicleta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bicicleta>
 */
class BicicletaFactory extends Factory
{
    protected $model = Bicicleta::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = ['carretera', 'mtb', 'gravel', 'rodillo'];
        return [
            'nombre' => $this->faker->word,
            'tipo' => $this->faker->randomElement($tipos),
            'comentario' => $this->faker->sentence,
        ];
    }
}

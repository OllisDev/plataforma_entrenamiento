<?php

namespace Database\Factories;

use App\Models\Ciclista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciclista>
 */
class CiclistaFactory extends Factory
{
    protected $model = Ciclista::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '-18 years'),
            'peso_base' => $this->faker->randomFloat(2, 50, 100),
            'altura_base' => $this->faker->numberBetween(150, 200),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ];
    }
}

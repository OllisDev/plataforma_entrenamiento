<?php

namespace Database\Factories;

use App\Models\ComponentesBicicleta;
use App\Models\Bicicleta;
use App\Models\TipoComponente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComponentesBicicleta>
 */
class ComponentesBicicletaFactory extends Factory
{
    protected $model = ComponentesBicicleta::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $velocidades = ['9v', '10v', '11v', '12v'];
        $posiciones = ['delantera', 'trasera', 'ambas'];
        return [
            'id_bicicleta' => Bicicleta::factory(),
            'id_tipo_componente' => TipoComponente::factory(),
            'marca' => $this->faker->company,
            'modelo' => $this->faker->word,
            'string' => $this->faker->word,
            'velocidad' => $this->faker->randomElement($velocidades),
            'posicion' => $this->faker->randomElement($posiciones),
            'fecha_montaje' => $this->faker->date,
            'fecha_retiro' => $this->faker->optional()->date,
            'km_actuales' => $this->faker->randomFloat(2, 0, 10000),
            'km_max_recomendado' => $this->faker->optional()->randomFloat(2, 1000, 20000),
            'activo' => $this->faker->boolean,
            'comentario' => $this->faker->sentence,
        ];
    }
}

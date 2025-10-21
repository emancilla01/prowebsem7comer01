<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'nombre_corto' => strtoupper($this->faker->lexify('???')),
            'telefono' => $this->faker->phoneNumber(),
        ];
    }
}

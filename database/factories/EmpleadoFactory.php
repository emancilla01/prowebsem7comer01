<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    public function definition()
    {
        // Generate a pseudo-RFC-like string (13 chars)
        $rfc = strtoupper($this->faker->bothify('????######???'));

        return [
            'RFC' => substr($rfc, 0, 13),
            'nombre' => $this->faker->firstName(),
            'apellido_pat' => $this->faker->lastName(),
            'apellido_mat' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
        ];
    }
}

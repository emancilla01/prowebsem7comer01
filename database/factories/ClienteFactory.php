<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha = $this->faker->dateTimeBetween('-60 years', '-18 years');
        return [
            'nombre' => $this->faker->firstName().' '.$this->faker->lastName(),
            'fecha_nac' => $fecha->format('Y-m-d'),
            'rfc' => strtoupper($this->faker->bothify('????######???')) ,
            'edad' => now()->diffInYears($fecha),
        ];
    }
}

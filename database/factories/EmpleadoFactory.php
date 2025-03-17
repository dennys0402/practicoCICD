<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName, // Usa 'nombres' en lugar de 'nombre'
            'apellidos' => $this->faker->lastName,
            'puesto' => $this->faker->jobTitle,
            'fecha_contratacion' => $this->faker->date(),
            'salario' => $this->faker->randomFloat(2, 1000, 5000),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'departamento' => $this->faker->word, // Asegúrate de que coincida con el nombre de la columna
        ];
    }
}

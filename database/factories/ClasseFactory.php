<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseFactory extends Factory
{
    public function definition()
    {
        $niveaux = ['6ème', '5ème', '4ème', '3ème', '2nde', '1ère', 'Terminale'];
        $lettres = ['A', 'B', 'C', 'D'];

        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'nom' => $this->faker->randomElement($niveaux) . ' ' . $this->faker->randomElement($lettres),
        ];
    }
}

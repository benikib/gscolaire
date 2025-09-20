<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'date_publication' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'statut' => $this->faker->randomElement(['brouillon', 'valide', 'publie']),
            'administrateur_id' => \App\Models\Administrateur::factory(),
        ];
    }
}

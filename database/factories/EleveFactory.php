<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EleveFactory extends Factory
{
    public function definition()
    {
        return [
            'type' => 'eleve',
            'date_naissance' => $this->faker->dateTimeBetween('-18 years', '-6 years'),
            'parent_id' => \App\Models\Parent::factory(),
            'classe_id' => \App\Models\Classe::factory(),
        ];
    }
}

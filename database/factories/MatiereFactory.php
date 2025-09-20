<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    public function definition()
    {
        $types = ['Devoir', 'Interrogation', 'Examen', 'Projet'];

        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'type' => $this->faker->randomElement($types),
            'libelle' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('-2 months', '+1 month'),
            'coefficient' => $this->faker->randomFloat(1, 0.5, 3),
            'classe_id' => \App\Models\Classe::factory(),
            'matiere_id' => \App\Models\Matiere::factory(),
            'professeur_id' => \App\Models\Professeur::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{12}'),
            'valeur' => $this->faker->randomFloat(2, 0, 20),
            'eleve_id' => \App\Models\Eleve::factory(),
            'evaluation_id' => \App\Models\Evaluation::factory(),
        ];
    }
}

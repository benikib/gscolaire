<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BulletinFactory extends Factory
{
    public function definition()
    {
        $periodes = [1, 2, 3];

        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'periode' => $this->faker->randomElement($periodes),
            'date_generation' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'eleve_id' => \App\Models\Eleve::factory(),
        ];
    }
}

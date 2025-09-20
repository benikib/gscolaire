<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResultatMatiereFactory extends Factory
{
    public function definition()
    {
        $appreciations = [
            'Très bien', 'Bien', 'Assez bien', 'Passable', 'Insuffisant', 'Médiocre'
        ];

        return [
            'moyenne' => $this->faker->randomFloat(2, 5, 18),
            'appreciation' => $this->faker->randomElement($appreciations),
            'bulletin_id' => \App\Models\Bulletin::factory(),
            'matiere_id' => \App\Models\Matiere::factory(),
        ];
    }
}

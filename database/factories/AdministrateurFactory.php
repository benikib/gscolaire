<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrateurFactory extends Factory
{
    public function definition()
    {
        return [
            'type' => 'administrateur',
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function ($administrateur) {
            //
        })->afterCreating(function ($administrateur) {
            //
        });
    }
}

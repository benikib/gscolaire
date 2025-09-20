<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceNotificationFactory extends Factory
{
    public function definition()
    {
        $services = ['Email', 'SMS', 'Push Notification', 'WhatsApp'];

        return [
            'nom' => $this->faker->unique()->randomElement($services),
            'description' => $this->faker->sentence(10),
        ];
    }
}

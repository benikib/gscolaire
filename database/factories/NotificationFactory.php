<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->regexify('[A-Z0-9]{12}'),
            'date_envoi' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'contenu' => $this->faker->paragraph(3),
            'statut_envoi' => $this->faker->boolean(80), // 80% de chance d'être envoyé
            'parent_id' => \App\Models\Parent::factory(),
            'service_notification_id' => \App\Models\ServiceNotification::factory(),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceNotificationSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_notifications')->insert([
            [
                'nom' => 'Email',
                'description' => 'Notification par email',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'SMS',
                'description' => 'Notification par SMS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'Push Notification',
                'description' => 'Notification push mobile',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'WhatsApp',
                'description' => 'Notification par WhatsApp',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $notifications = [];
        $parents = DB::table('utilisateurs')->where('type', 'like', '%pere%')
                    ->orWhere('type', 'like', '%mere%')
                    ->orWhere('type', 'like', '%tuteur%')
                    ->pluck('id')->toArray();
        $services = DB::table('service_notifications')->pluck('id')->toArray();

        for ($i = 1; $i <= 200; $i++) {
            $notifications[] = [
                'id' => 'NOT' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'date_envoi' => date('Y-m-d H:i:s', strtotime('-' . rand(0, 30) . ' days')),
                'contenu' => 'Notification importante concernant les résultats de votre enfant. ' .
                            'Veuillez consulter le bulletin dans l\'application.',
                'statut_envoi' => rand(0, 1),
                'parent_id' => $parents[array_rand($parents)],
                'service_notification_id' => $services[array_rand($services)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('notifications')->insert($notifications);
    }
}

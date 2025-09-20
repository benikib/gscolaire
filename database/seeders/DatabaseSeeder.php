<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StatutPublicationSeeder::class,
            ServiceNotificationSeeder::class,
            ClasseSeeder::class,
            MatiereSeeder::class,
            AdministrateurSeeder::class,
            ParentSeeder::class,
            ProfesseurSeeder::class,
            EleveSeeder::class,
            EvaluationSeeder::class,
            NoteSeeder::class,
            BulletinSeeder::class,
            ResultatMatiereSeeder::class,
            PublicationSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}

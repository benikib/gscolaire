<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationSeeder extends Seeder
{
    public function run()
    {
        $publications = [];
        $administrateurs = DB::table('utilisateurs')->where('type', 'administrateur')->pluck('id')->toArray();
        $statuts = ['brouillon', 'valide', 'publie'];

        for ($i = 1; $i <= 50; $i++) {
            $publications[] = [
                'id' => 'PUB' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'date_publication' => date('Y-m-d', strtotime('-' . rand(0, 90) . ' days')),
                'statut' => $statuts[array_rand($statuts)],
                'administrateur_id' => $administrateurs[array_rand($administrateurs)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('publications')->insert($publications);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutPublicationSeeder extends Seeder
{
    public function run()
    {
        DB::table('statut_publications')->insert([
            ['id' => 'brouillon', 'nom' => 'Brouillon', 'valeur' => 'brouillon'],
            ['id' => 'valide', 'nom' => 'Validé', 'valeur' => 'valide'],
            ['id' => 'publie', 'nom' => 'Publié', 'valeur' => 'publie'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesseurSeeder extends Seeder
{
    public function run()
    {
        $professeurs = [];
        $matieres = DB::table('matieres')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $sexe = ($i % 2 == 0) ? 'F' : 'M';

            $professeurs[] = [
                'id' => 'PRO' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'login' => 'prof' . $i,
                'password' => Hash::make('prof123'),
                'nom' => 'Professeur' . $i,
                'prenom' => 'Prénom' . $i,
                'email' => 'prof' . $i . '@ecole.fr',
                'telephone' => '06' . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
                'sexe' => $sexe,
                'date_naissance' => date('Y-m-d', strtotime('-' . rand(25, 60) . ' years')),
                'type' => 'professeur',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('utilisateurs')->insert($professeurs);

        // Associer les professeurs aux matières
        $profMatiere = [];
        $professeursIds = DB::table('utilisateurs')->where('type', 'professeur')->pluck('id')->toArray();

        foreach ($professeursIds as $profId) {
            $nbMatieres = rand(2, 4);
            $matieresAssociees = array_rand($matieres, $nbMatieres);

            if (!is_array($matieresAssociees)) {
                $matieresAssociees = [$matieresAssociees];
            }

            foreach ($matieresAssociees as $matiereIndex) {
                $profMatiere[] = [
                    'professeur_id' => $profId,
                    'matiere_id' => $matieres[$matiereIndex],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('matiere_professeur')->insert($profMatiere);
    }
}

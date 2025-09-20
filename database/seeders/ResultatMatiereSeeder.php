<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatMatiereSeeder extends Seeder
{
    public function run()
    {
        $resultats = [];
        $bulletins = DB::table('bulletins')->pluck('id')->toArray();
        $matieres = DB::table('matieres')->pluck('id')->toArray();
        $appreciations = ['Excellent', 'Très bien', 'Bien', 'Assez bien', 'Passable', 'Insuffisant'];

        foreach ($bulletins as $bulletinId) {
            $nbMatieres = rand(8, 12); // 8 à 12 matières par bulletin

            $matieresSelection = array_rand($matieres, min($nbMatieres, count($matieres)));
            if (!is_array($matieresSelection)) {
                $matieresSelection = [$matieresSelection];
            }

            foreach ($matieresSelection as $matiereIndex) {
                $moyenne = rand(5, 19) + (rand(0, 9) / 10); // Moyenne entre 5.0 et 19.9

                $resultats[] = [
                    'moyenne' => $moyenne,
                    'appreciation' => $appreciations[min(floor($moyenne / 3), 5)],
                    'bulletin_id' => $bulletinId,
                    'matiere_id' => $matieres[$matiereIndex],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        foreach (array_chunk($resultats, 1000) as $chunk) {
            DB::table('resultat_matieres')->insert($chunk);
        }
    }
}

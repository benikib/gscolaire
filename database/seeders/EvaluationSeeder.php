<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = [];
        $classes = DB::table('classes')->pluck('id')->toArray();
        $matieres = DB::table('matieres')->pluck('id')->toArray();
        $professeurs = DB::table('utilisateurs')->where('type', 'professeur')->pluck('id')->toArray();

        $types = ['Contrôle', 'Devoir', 'Interrogation', 'Examen', 'TP', 'Oral'];

        for ($i = 1; $i <= 500; $i++) {
            $evaluations[] = [
                'id' => 'EVAL' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'type' => $types[array_rand($types)],
                'libelle' => $types[array_rand($types)] . ' ' . $i,
                'date' => date('Y-m-d', strtotime('+' . rand(1, 365) . ' days')),
                'coefficient' => rand(1, 5),
                'classe_id' => $classes[array_rand($classes)],
                'matiere_id' => $matieres[array_rand($matieres)],
                'professeur_id' => $professeurs[array_rand($professeurs)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Insérer par lots de 100 pour éviter les timeouts
        foreach (array_chunk($evaluations, 100) as $chunk) {
            DB::table('evaluations')->insert($chunk);
        }
    }
}

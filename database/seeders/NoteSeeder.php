<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    public function run()
    {
        $notes = [];
        $evaluations = DB::table('evaluations')->pluck('id')->toArray();
        $eleves = DB::table('utilisateurs')->where('type', 'eleve')->pluck('id')->toArray();

        foreach ($eleves as $eleveId) {
            $nbNotes = rand(15, 30); // 15 à 30 notes par élève

            for ($i = 0; $i < $nbNotes; $i++) {
                $notes[] = [
                    'id' => 'NOTE' . uniqid(),
                    'valeur' => rand(0, 200) / 10, // Notes entre 0 et 20
                    'eleve_id' => $eleveId,
                    'evaluation_id' => $evaluations[array_rand($evaluations)],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        // Insérer par lots de 1000 pour éviter les timeouts
        foreach (array_chunk($notes, 1000) as $chunk) {
            DB::table('notes')->insert($chunk);
        }
    }
}

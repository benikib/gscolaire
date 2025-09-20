<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EleveSeeder extends Seeder
{
    public function run()
    {
        $eleves = [];
        $classes = DB::table('classes')->pluck('id')->toArray();
        $parents = DB::table('utilisateurs')->where('type', 'like', '%pere%')
            ->orWhere('type', 'like', '%mere%')
            ->orWhere('type', 'like', '%tuteur%')
            ->pluck('id')->toArray();

        for ($i = 1; $i <= 200; $i++) {
            $sexe = ($i % 2 == 0) ? 'F' : 'M';
            $eleveId = 'ELE' . str_pad($i, 3, '0', STR_PAD_LEFT);

            // Insérer dans la table utilisateurs
            DB::table('utilisateurs')->insert([
                'id' => $eleveId,
                'login' => 'eleve' . $i,
                'password' => Hash::make('eleve123'),
                'nom' => 'Élève' . $i,
                'prenom' => 'Prénom' . $i,
                'email' => 'eleve' . $i . '@ecole.fr',
                'telephone' => null,
                'sexe' => $sexe,
                'date_naissance' => date('Y-m-d', strtotime('-' . rand(12, 18) . ' years')),
                'type' => 'eleve',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insérer dans la table eleves
            DB::table('eleves')->insert([
                'id' => $eleveId,
                'parent_id' => $parents[array_rand($parents)],
                'classe_id' => $classes[array_rand($classes)],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    public function run()
    {
        $classes = [];
        $niveaux = ['6ème', '5ème', '4ème', '3ème', '2nde', '1ère', 'Terminale'];
        $lettres = ['A', 'B', 'C', 'D'];

        foreach ($niveaux as $niveau) {
            foreach ($lettres as $lettre) {
                $classes[] = [
                    'id' => 'CL' . substr($niveau, 0, 1) . $lettre . rand(100, 999),
                    'nom' => $niveau . ' ' . $lettre,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('classes')->insert($classes);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereSeeder extends Seeder
{
    public function run()
    {
        $matieres = [
            ['id' => 'MAT001', 'nom' => 'Mathématiques'],
            ['id' => 'MAT002', 'nom' => 'Français'],
            ['id' => 'MAT003', 'nom' => 'Histoire-Géographie'],
            ['id' => 'MAT004', 'nom' => 'SVT'],
            ['id' => 'MAT005', 'nom' => 'Physique-Chimie'],
            ['id' => 'MAT006', 'nom' => 'Anglais'],
            ['id' => 'MAT007', 'nom' => 'Espagnol'],
            ['id' => 'MAT008', 'nom' => 'Allemand'],
            ['id' => 'MAT009', 'nom' => 'EPS'],
            ['id' => 'MAT010', 'nom' => 'Technologie'],
            ['id' => 'MAT011', 'nom' => 'Arts Plastiques'],
            ['id' => 'MAT012', 'nom' => 'Musique'],
        ];

        foreach ($matieres as $matiere) {
            $matiere['created_at'] = now();
            $matiere['updated_at'] = now();
        }

        DB::table('matieres')->insert($matieres);
    }
}

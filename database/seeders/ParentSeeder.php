<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    public function run()
    {
        $parents = [];
        $types = ['pere', 'mere', 'tuteur'];

        for ($i = 1; $i <= 50; $i++) {
            $sexe = ($i % 2 == 0) ? 'F' : 'M';
            $type = $types[array_rand($types)];

            $parents[] = [
                'id' => 'PAR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'login' => 'parent' . $i,
                'password' => Hash::make('parent123'),
                'nom' => 'Parent' . $i,
                'prenom' => 'Prénom' . $i,
                'email' => 'parent' . $i . '@exemple.fr',
                'telephone' => '06' . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
                'sexe' => $sexe,
                'date_naissance' => date('Y-m-d', strtotime('-' . rand(30, 50) . ' years')),
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('utilisateurs')->insert($parents);
    }
}

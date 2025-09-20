<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministrateurSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateurs')->insert([
            [
                'id' => 'ADM001',
                'login' => 'admin.principal',
                'password' => Hash::make('admin123'),
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@ecole.fr',
                'telephone' => '0123456789',
                'sexe' => 'M',
                'date_naissance' => '1980-05-15',
                'type' => 'administrateur',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'ADM002',
                'login' => 'admin.secondaire',
                'password' => Hash::make('admin123'),
                'nom' => 'Martin',
                'prenom' => 'Sophie',
                'email' => 'sophie.martin@ecole.fr',
                'telephone' => '0123456790',
                'sexe' => 'F',
                'date_naissance' => '1985-08-22',
                'type' => 'administrateur',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulletinSeeder extends Seeder
{
    public function run()
    {
        $bulletins = [];
        $eleves = DB::table('utilisateurs')->where('type', 'eleve')->pluck('id')->toArray();

        foreach ($eleves as $eleveId) {
            for ($periode = 1; $periode <= 3; $periode++) {
                $bulletins[] = [
                    'id' => 'BUL' . substr($eleveId, 3) . 'P' . $periode,
                    'periode' => $periode,
                    'date_generation' => date('Y-m-d', strtotime('-' . (4 - $periode) . ' months')),
                    'eleve_id' => $eleveId,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('bulletins')->insert($bulletins);
    }
}

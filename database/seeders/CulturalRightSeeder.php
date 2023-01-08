<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulturalRightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cultural_rights')->insert([
            'name' => 'Identidad y patrimonios culturales'
        ]);

        DB::table('cultural_rights')->insert([
            'name' => 'Referencias a comunidades culturales'
        ]);

        DB::table('cultural_rights')->insert([
            'name' => 'Acceso y participación en la vida cultural'
        ]);

        DB::table('cultural_rights')->insert([
            'name' => 'Educación y formación'
        ]);

        DB::table('cultural_rights')->insert([
            'name' => 'Información y comunicación'
        ]);

        DB::table('cultural_rights')->insert([
            'name' => 'Cooperación cultural'
        ]);
    }
}

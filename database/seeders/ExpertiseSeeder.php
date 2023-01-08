<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expertises')->insert([
            'name' => 'Artes plásticas'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Teatro'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Música'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Danza'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Cocina tradicional'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Juegos tradicionales'
        ]);

        DB::table('expertises')->insert([
            'name' => 'Promoción de lectura'
        ]);
    }
}

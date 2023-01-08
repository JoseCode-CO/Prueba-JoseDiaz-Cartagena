<?php

namespace Database\Seeders;

use App\Models\Expertise;
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
        Expertise::create([
            'id' => 1,
            'name' => 'Artes plásticas'
        ]);

        Expertise::create([
            'id' => 2,
            'name' => 'Teatro'
        ]);

        Expertise::create([
            'id' => 3,
            'name' => 'Música'
        ]);

        Expertise::create([
            'id' => 4,
            'name' => 'Danza'
        ]);

        Expertise::create([
            'id' => 5,
            'name' => 'Cocina tradicional'
        ]);

        Expertise::create([
            'id' => 6,
            'name' => 'Juegos tradicionales'
        ]);

        Expertise::create([
            'id' => 7,
            'name' => 'Promoción de lectura'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\CulturalRight;
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
        CulturalRight::create([
            'id' => 1,
            'name' => 'Identidad y patrimonios culturales'
        ]);

        CulturalRight::create([
            'id' => 2,
            'name' => 'Referencias a comunidades culturales'
        ]);

        CulturalRight::create([
            'id' => 3,
            'name' => 'Acceso y participación en la vida cultural'
        ]);

        CulturalRight::create([
            'id' => 4,
            'name' => 'Educación y formación'
        ]);

        CulturalRight::create([
            'id' => 5,
            'name' => 'Información y comunicación'
        ]);

        CulturalRight::create([
            'id' => 6,
            'name' => 'Cooperación cultural'
        ]);
    }
}

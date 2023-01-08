<?php

namespace Database\Seeders;

use App\Models\Nac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacSeeder extends Seeder
{
    private $nacs;

    public function __construct()
    {
        $this->nacs =  [
            [
                'id' => 1,
                'name' => 'ALCALÁ'
            ],
            [
                'id' => 2,
                'name' => 'ANDALUCÍA'
            ],
            [
                'id' => 3,
                'name' => 'ANSERMANUEVO'
            ],
            [
                'id' => 4,
                'name' => 'ARGELIA'
            ],
            [
                'id' => 5,
                'name' => 'BOLÍVAR'
            ],
            [
                'id' => 6,
                'name' => 'BUENAVENTURA'
            ],
            [
                'id' => 7,
                'name' => 'BUGA'
            ],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->nacs as $nac) {
            Nac::create([
                'id' => $nac['id'],
                'name' => $nac['name'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pol;
use Illuminate\Database\Seeder;

class PolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pol::create([
            'pol' => 'Muski'
        ]);

        Pol::create([
            'pol' => 'Zenski'
        ]);
    
    }
}

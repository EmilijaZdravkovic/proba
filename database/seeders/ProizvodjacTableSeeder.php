<?php

namespace Database\Seeders;

use App\Models\Proizvodjac;
use Illuminate\Database\Seeder;

class ProizvodjacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proizvodjac::create([
            'proizvodjac' => 'Fossil'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Diesel'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Festina'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Seiko'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'G-Shock'
        ]);


    }
}

<?php

namespace Database\Seeders;

use App\Models\Sat;
use Illuminate\Database\Seeder;

class SatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            Sat::create([
                'proizvodjacID' => rand(1,5),
                'model' => $faker->firstName(),
                'polID' => rand(1,2), 
                'cena' => $faker->numberBetween(50, 250)
            ]);
        }
    }
}

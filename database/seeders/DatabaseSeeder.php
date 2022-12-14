<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UserTableSeeder::class);
       $this->call(ProizvodjacTableSeeder::class);
       $this->call(PolTableSeeder::class);
       $this->call(SatTableSeeder::class);
    }
}

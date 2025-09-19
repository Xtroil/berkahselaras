<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(Master2025Bangkep::class);
        $this->call(UserSeeder::class);
        $this->call(UserSKPDSeeder::class);
        $this->call(PerangkatDaerahSeeder::class);
    }
}

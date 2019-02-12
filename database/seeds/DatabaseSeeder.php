<?php

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
        $this->call(TanamanSeeder::class);
        $this->call(KelompokSeeder::class);        
        $this->call(JadwalSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StateSeeder::class);
        // $this->call(MediatanamSeeder::class);
    }
}

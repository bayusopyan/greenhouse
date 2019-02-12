<?php

use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelompok')->insert([
            'id' => 'K1',
            'nama' => 'Kelompok 1',
        ]);
        DB::table('kelompok')->insert([
            'id' => 'K2',
            'nama' => 'Kelompok 2',
        ]);         
    }
}

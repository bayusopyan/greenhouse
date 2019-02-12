<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert([
            'field' => 'paranet',
            'value' => 'tutup',
        ]);  

        DB::table('state')->insert([
            'field' => 'relay',
            'value' => 'relay_off',
        ]);          
    }
}

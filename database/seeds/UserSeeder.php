<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123123123';
        
        DB::table('users')->insert([
            'name' => 'HMIB',
            'email' => 'hmib@gmail.com',
            'password' => Hash::make($password),
            'admin' => 1
        ]);  

        DB::table('users')->insert([
            'name' => 'Vigit Waluyo',
            'email' => 'vigitwaluyo@gmail.com',
            'password' => Hash::make($password),
            'kelompok' => 'K1'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Setya Novanto',
            'email' => 'setyanovanto@gmail.com',
            'password' => Hash::make($password),
            'kelompok' => 'K1'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Amrozi',
            'email' => 'amrozi@gmail.com',
            'password' => Hash::make($password),
            'kelompok' => 'K2'
        ]);

        DB::table('users')->insert([
            'name' => 'Imam Samudra',
            'email' => 'imamsamudra@gmail.com',
            'password' => Hash::make($password),
            'kelompok' => 'K2'
        ]);
        
        DB::table('users')->insert([
            'name' => 'John Kei',
            'email' => 'johnkei@gmail.com',
            'password' => Hash::make($password),
        ]); 
        
        DB::table('users')->insert([
            'name' => 'Abu Sayaf',
            'email' => 'abusayaf@gmail.com',
            'password' => Hash::make($password),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Nazarudin',
            'email' => 'nazarudin@gmail.com',
            'password' => Hash::make($password),
        ]);        

      
        
        
    }
}

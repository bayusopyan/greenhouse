<?php

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal')->insert([
            'nama' => 'Sesi 1',
            'tgl_masuk' => "2018-11-1",
            'tgl_keluar' => "2018-12-1",
            'kelompok' => 'K1',
            'tanaman' => 'AK',
            'jumlah_tanaman' => 10,
            'status' => 'selesai',
        ]);
        
        DB::table('jadwal')->insert([
            'nama' => 'Sesi 2',
            'tgl_masuk' => "2019-1-1",
            'kelompok' => 'K1',
            'tanaman' => 'AK',
            'jumlah_tanaman' => 8,
            'status' => 'selesai',            
        ]);  
        
    }
}

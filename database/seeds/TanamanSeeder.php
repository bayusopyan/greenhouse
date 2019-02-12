<?php

use Illuminate\Database\Seeder;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tanaman')->insert([
            'id' => 'AK',
            'nama' => 'Angrek',
            'keterangan' => 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia.
             Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek.'
        ]);

        DB::table('tanaman')->insert([
            'id' => 'KR',
            'nama' => 'Krisan',
            'keterangan' => 'krisan  adalah sejenis 
            tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan 
            atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.'
        ]);
              
        DB::table('tanaman')->insert([
            'id' => 'SB',
            'nama' => 'Selada Bokor',
            'keterangan' => 'Selada (Lactuca sativa) adalah tumbuhan sayur yang biasa 
            ditanam di daerah beriklim sedang maupun daerah tropika.'
        ]);        
         
    }
}

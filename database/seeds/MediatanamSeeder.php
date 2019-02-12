<?php

use Illuminate\Database\Seeder;

class MediatanamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        function random_float ($min,$max) {
            return ($min+lcg_value()*(abs($max-$min)));
         }
    
        $date = new DateTime();
        $date->setDate(2018, 6, 1);

        while(($date->format('m')<=6)||($date->format('Y')<=2019)){
            
            $cahaya = rand(1,1000);
            $suhu = rand(-40,40);
            $ph = random_float(0.1,7.0);
            $kt = rand(0,300);
            
            DB::table('mediatanam')->insert([
                [ 'cahaya'=>$cahaya, 'suhu'=>$suhu, 'ph'=>$ph ,'kt'=>$kt , 'jam'=>$date->format('H:i:s'), 'tanggal'=>$date->format('Y-m-d') ]
            ]);

            $date->modify('+3 hour');
        }        

        

    }
}

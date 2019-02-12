<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\State;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }     
    
    public function update_state($field,$value){
        $data = State::find($field);
        $data->value = $value;
        $data->save();
        
        return response()->json($data);

    }
    
    
    public function getState(){
        $data = DB::table('state')
        ->get();

        return response()->json($data);
    }

    public function index_laporan(){
        // $collection = DB::select("select tanggal from mediatanam
        // group by YEAR(tanggal), MONTH(tanggal) 
        // order by tanggal desc");
        $collection = DB::table('mediatanam')->orderBy('tanggal', 'desc')->get();
        $collection = $collection->groupBy(function($graph){
            return date('Y-m-d',strtotime($graph->tanggal));
        });
        $collection = $collection->map(function($item){
            $return['cahaya'] = $item->median('cahaya');
            $return['suhu'] = $item->median('suhu');
            $return['ph'] = $item->median('ph');
            $return['kt'] = $item->median('kt');
            return $return;
        });

        return view('index_laporan',compact('collection'));
    }
    
    public function getLaporanPerBulan($y,$m){
        
        $collection = DB::select('
            select day(tanggal) as day, avg(cahaya) as "cahaya",avg(suhu) as "suhu",avg(ph) as "ph",avg(kt) as "kt" from mediatanam
            group by tanggal
            having year(tanggal) = '.$y.' and month(tanggal) = '.$m.';        
        ');

        $cahaya = array();
        $suhu = array();
        $ph = array();
        $kt = array();

        foreach ($collection as $key) {
            array_push($cahaya,$key->cahaya);
            array_push($ph,$key->ph);
            array_push($suhu,$key->suhu);
            array_push($kt,$key->kt);
        }
  
        $view = view('laporanPerBulan',compact('collection'))->render();
        
        return response()->json(['html'=>$view,'cahaya'=>$cahaya,'ph'=>$ph,'suhu'=>$suhu,'kt'=>$kt]);

    }    
    
    


}

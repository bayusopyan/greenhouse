<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Kelompok;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        $md = DB::table('mediatanam')
        ->orderBy('id', 'desc')
        ->limit(1)        
        ->get(['cahaya','suhu','ph','kt']);


        $cahaya = $md[0]->cahaya;
        $suhu = $md[0]->suhu;
        $ph = $md[0]->ph; 
        $kt = $md[0]->kt;     
        
        // $proses = DB::table('users as u')
        // ->join('kelompok as k','k.id','u.kelompok')
        // ->join('jadwal as j','j.kelompok','k.id')
        // ->join('tanaman as t','t.jadwal','j.id')
        // ->get(['t.id','t.nama','t.status']);        

        // $proses = count($proses);

        // $url = $request->url();
        // dd(Input::get('cahaya'));

        $kelompok = Kelompok::find(Auth::user()->kelompok);

        return view('home',compact('cahaya','tanaman','suhu','ph','kt'));
    }
  

    public function update_state($dev,$kondisi){
        $data = State::find($dev);
        $data->kondisi = $kondisi;
        $data->save();
        
        return response()->json($data);

    }    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Kelompok;
use Illuminate\Support\Facades\Auth;
class KelompokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }     
    
    //CRUD KELOMPOK
    public function index_kelompok(){
        
        
        $data = DB::table('kelompok')->get();
        $n = count($data);
        for ($i=0; $i<$n ; $i++) {
            $user = DB::table('users')
            ->where('kelompok',$data[$i]->id)
            ->get(['id','name','kelompok'])
            ->toArray();
            $data[$i]->user = $user;
            $total = User::where('kelompok',$data[$i]->id)->get();
            $data[$i]->total = count($total);
        }
        
        $data = $data->toArray();

        return view('admin-page.kelompok.index',compact('data'));
        
    }
    
    public function create_kelompok(){
        return view('admin-page.kelompok.create');
    }

    public function store_kelompok(Request $request){
        $data = new Kelompok();
        $data->id = $request->id;        
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('index_kelompok');
    }

    public function edit_kelompok(Request $request,$id){
        $data = Kelompok::find($id);
        $anggota = DB::table('users')
        ->where('kelompok',$id)
        ->get();
        $nganggur = DB::table('users')
        ->whereNull('kelompok')
        ->where('admin','0')
        ->get();

        return view('admin-page.kelompok.edit',compact('data','anggota','nganggur'));
    }    

    public function tambahAnggota(Request $request,$id){
        $anggotaKelompok = $request->anggotaKelompok;
        $n = count($anggotaKelompok);
        
        for ($i=0; $i < $n; $i++) { 
            $data = User::find($anggotaKelompok[$i]);
            $data->kelompok = $id;
            $data->save();
        }


        return redirect()->route('edit_kelompok',$id);
    }        

    public function update_kelompok(Request $request,$id){
        $data = Kelompok::find($id);
        $data->nama = $request->nama;
        $data->save();

        return redirect()->route('edit_kelompok',$id);
    }

    public function hapusAnggota($id){
        $user = User::find($id);
        $user->kelompok = null;
        $user->save();

        return redirect()->route('index_kelompok');
    }

    public function destroy_kelompok($id){
        $data = Kelompok::find($id);
        $data->delete();
        return redirect()->route('index_kelompok')->with('success', 'Kelompok has been deleted Successfully');        
    }    

}

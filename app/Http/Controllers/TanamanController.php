<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;

class TanamanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }       
    
    
    public function index_tanaman(){
        $data = Tanaman::all();
        return view('admin-page.tanaman.index',compact('data'));
        
    }
    
    public function create_tanaman(){
        return view('admin-page.tanaman.create');

    }

    public function store_tanaman(Request $request){
        $data = new Tanaman();
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('index_tanaman');
    }
    
    public function edit_tanaman(Request $request,$id){
        $data = Tanaman::find($id);
        return view('admin-page.tanaman.edit',compact('data'));
    }
    
    public function update_tanaman(Request $request,$id){
        $data = Tanaman::find($id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('edit_tanaman',$id);
    }

    public function destroy_tanaman($id){
        $data = Tanaman::find($id);
        $data->delete();
        return redirect()->route('index_tanaman')->with('success', 'Kelompok has been deleted Successfully');        
    }      
    

}

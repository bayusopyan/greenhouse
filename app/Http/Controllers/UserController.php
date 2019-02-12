<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Kelompok;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
    }     
    
    // CRUD USER
    public function index_user(){

        $data = User::all();
        return view('admin-page.user.index',compact('data'));
    }
    
    public function create_user(){
        $data = Kelompok::all();
        return view('admin-page.user.create',compact('data'));
       
    }

    public function store_user(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->kelompok = $request->kelompok;
        $data->save();
        return redirect()->route('index_user');
    }
    
    public function edit_user($id){
        $data = User::find($id);
        $kelompok = Kelompok::all();
        return view('admin-page.user.edit',compact('data','kelompok'));
    }

    public function update_user(Request $request, $id){
        $data = User::find($id);
        
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password == !null){
                $data->password = Hash::make($request->password);
        }
        $data->kelompok = $request->kelompok;
        $data->save();
        return redirect()->route('edit_user',$id);
    }
    
    public function destroy_user($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('index_user')->with('success', 'User has been deleted Successfully');        
    }    
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\MediaTanam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ArduinoController extends Controller
{
    public function insert(Request $request) {
    	$data['tanggal'] = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');
    	$data['jam'] = Carbon::parse(Carbon::now())->format('H:i:s');
    	$data['kt'] = $request->kelembapan;
    	$request->merge($data);
	    $media_tanam = MediaTanam::create($request->all());

	    return response()->json($media_tanam);
    }

    public function geto(Request $request) {
    	if($request->has('field')) {
    		$relay = DB::table('state')->where('field', $request->field)->first();
    		return $relay->value;
    	}

    	return '0 results';
    }
}

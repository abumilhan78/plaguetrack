<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class mobileController extends Controller
{
    public function indo() //se-indonesia
    {
    	$nowDay = Carbon::now()->format('d'); 
    	$dt_now = DB::table('tracks')
	    			->select(DB::raw('SUM(positif) as positif'), DB::raw('SUM(sembuh) as sembuh'), DB::raw('SUM(meninggal) as meninggal'))
	    			->whereDay('created_at', '=' , $nowDay)
	    			->get();
    	$dt = DB::table('tracks')->select(DB::raw('SUM(positif) as positif'), DB::raw('SUM(sembuh) as sembuh'), DB::raw('SUM(meninggal) as meninggal'))
    				->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

}

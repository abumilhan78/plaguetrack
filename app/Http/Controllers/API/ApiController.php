<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ApiController extends Controller
{
    public function sumProvince()
    {
    	$fetch = DB::table('tracks')
    			->select('tracks.positif', 'rws.rw_name', 'subdistricts.subdist_name')
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			
    			->get();
        $res = [
            'success' => true,
            'data' => ['today' => 'dodol',
            		  'total' => 'dodol garut'],
            'message' => 'berhasil'
        ];

        return $fetch;
    }

    public function provXcity($id)
    {
    	$prov = Province::whereId($id)->first();
    	$city = City::where('prov_id', $id)->get();
    	$res = [
    		'success' => true,
    		'data' => [$prov, $city] ,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sumTrack()
    {
    	$nowDay = Carbon::now()->format('d'); 
    	$pstv_now = DB::table('tracks')
    			->select(DB::raw('SUM(positif) as positif'), DB::raw('SUM(sembuh) as sembuh'), DB::raw('SUM(meninggal) as meninggal'))
    			->whereDay('created_at', '=' , $nowDay)
    			->get();
    	$pstv = DB::table('tracks')->select(DB::raw('SUM(positif) as positif'), DB::raw('SUM(sembuh) as sembuh'), DB::raw('SUM(meninggal) as meninggal'))
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $pstv_now,
    		 		'total' => $pstv
    		 		],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }



}

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

    //DATA STATISTIK JAMAK
    public function sumTrack() //se-indonesia
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
    		'data' => [['name' => 'Indonesia','hari_ini' => $dt_now, 'total' => $dt]],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }


    public function sumRW() //per-RW
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('rws.id as kd_rw'), DB::raw('rws.rw_name as rw'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->groupBy('rws.id')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('rws.id as kd_rw'), DB::raw('rws.rw_name as rw'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('rws.id')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sumSubDist() //per-Kelurahan
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('subdistricts.subdist_name as kelurahan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->groupBy('subdistricts.subdist_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('subdistricts.subdist_name as kelurahan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('subdistricts.subdist_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sumDist() //per-Kecamatan
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('districts.dist_name as kecamatan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->groupBy('districts.dist_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('districts.dist_name as kecamatan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('districts.dist_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sumCity() //per-Kota/Kabupaten
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('cities.city_name as kota'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->groupBy('cities.city_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('cities.city_name as kota'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('cities.city_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sumProv() //per-Provinsi
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->groupBy('provinces.prov_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('provinces.prov_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }


    // DATA STATISTIK TUNGGAL
    public function singleRW($id)
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('rws.id as kd_rw'), DB::raw('rws.rw_name as rw'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->where('rws.id', $id)
    			->groupBy('rws.id')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('rws.id as kd_rw'), DB::raw('rws.rw_name as rw'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->where('rws.id', $id)
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('rws.id')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function singleSubDist($id)
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('subdistricts.subdist_name as kelurahan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->where('subdistricts.id', $id)
    			->groupBy('subdistricts.subdist_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('subdistricts.subdist_name as kelurahan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->where('subdistricts.id', $id)
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('subdistricts.subdist_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function singleDist($id)
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('districts.dist_name as kecamatan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->where('districts.id', $id)
    			->groupBy('districts.dist_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('districts.dist_name as kecamatan'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->where('districts.id', $id)
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('districts.dist_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function singleCity($id)
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('cities.city_name as kota'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->where('cities.id', $id)
    			->groupBy('cities.city_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('cities.city_name as kota'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->where('cities.id', $id)
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('cities.city_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function singleProv($id)
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->where('provinces.id', $id)
    			->groupBy('provinces.prov_name')
    			->get();
    	$dt_now = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->where('provinces.id', $id)
    			->whereDate('tracks.created_at', '=' , $nowDay)
    			->groupBy('provinces.prov_name')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'keseluruhan' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function positif()
    {
    	$nowDay = Carbon::now()->format('d'); 
    	$dt_now = DB::table('tracks')
	    			->select(DB::raw('SUM(positif) as positif'))
	    			->whereDay('created_at', '=' , $nowDay)
	    			->get();
    	$dt = DB::table('tracks')->select(DB::raw('SUM(positif) as positif'))
    				->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'total' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function meninggal()
    {
    	$nowDay = Carbon::now()->format('d'); 
    	$dt_now = DB::table('tracks')
	    			->select(DB::raw('SUM(meninggal) as meninggal'))
	    			->whereDay('created_at', '=' , $nowDay)
	    			->get();
    	$dt = DB::table('tracks')->select(DB::raw('SUM(meninggal) as meninggal'))
    				->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'total' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function sembuh()
    {
    	$nowDay = Carbon::now()->format('d'); 
    	$dt_now = DB::table('tracks')
	    			->select(DB::raw('SUM(sembuh) as sembuh'))
	    			->whereDay('created_at', '=' , $nowDay)
	    			->get();
    	$dt = DB::table('tracks')->select(DB::raw('SUM(sembuh) as sembuh'))
    				->get();
    	$res = [
    		'success' => true,
    		'data' => ['hari_ini' => $dt_now, 'total' => $dt],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }
}

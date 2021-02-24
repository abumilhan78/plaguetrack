<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class frontController extends Controller
{
    public function index() //per-Provinsi
    {
    	$nowDay = Carbon::now()->format('Y-m-d');
    	$dt = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'),
                    DB::raw('SUM(tracks.positif) as positif'),
                    DB::raw('SUM(tracks.sembuh) as sembuh'),
                    DB::raw('SUM(tracks.meninggal) as meninggal'),
                    DB::raw('provinces.id as id_prov'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->groupBy('provinces.id')
    			->get();
        $datas =  Http::get('https://api.kawalcorona.com/')->json();
        $dt_global = [];
        $pos_glob = 0; $sem_glob = 0; $men_glob =0;
        foreach ($datas as $key => $value) {
            $raw = $value['attributes'];
            $res = [
                'Negara' => $raw['Country_Region'],
                'Positif' => $raw['Confirmed'],
                'Meninggal' => $raw['Deaths'],
                'Sembuh' => $raw['Recovered']
            ];
            array_push($dt_global, $res);
            $pos_glob += $raw['Confirmed'];
            $sem_glob += $raw['Recovered'];
            $men_glob += $raw['Deaths'];
        }
        $sum_glob = [
            "positif" => $pos_glob,
            "sembuh" => $sem_glob,
            "meninggal" => $men_glob
        ];
    	return view('front.index', compact('dt', 'dt_global', 'sum_glob'));
    }

    public function singleCity($id)
    {
    	$dt = DB::table('tracks')
    			->select(DB::raw('provinces.prov_name as provinsi'), DB::raw('cities.city_name as kota'), DB::raw('SUM(tracks.positif) as positif'), DB::raw('SUM(tracks.sembuh) as sembuh'), DB::raw('SUM(tracks.meninggal) as meninggal'), DB::raw('provinces.id as id_prov'), DB::raw('cities.id as id_city'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->where('provinces.id', $id)
    			->groupBy('cities.city_name')
    			->get();
    	
    	return view('front.provXcity', compact('dt'));
    }

    public function singleDist($idProv, $idCity)
    {
        $dt = DB::table('tracks')
    			->select(
                    DB::raw('provinces.prov_name as provinsi'),
                    DB::raw('cities.city_name as kota'),
                    DB::raw('districts.dist_name as kecamatan'),
                    DB::raw('SUM(tracks.positif) as positif'),
                    DB::raw('SUM(tracks.sembuh) as sembuh'),
                    DB::raw('SUM(tracks.meninggal) as meninggal'),
                    DB::raw('provinces.id as id_prov'),
                    DB::raw('cities.id as id_city'))
    			->join('rws', 'rws.id', '=', 'tracks.rw_id')
    			->join('subdistricts', 'subdistricts.id', '=', 'rws.subdist_id')
    			->join('districts', 'districts.id', '=', 'subdistricts.dist_id')
    			->join('cities', 'cities.id', '=', 'districts.city_id')
    			->join('provinces', 'provinces.id', '=', 'cities.prov_id')
    			->where('provinces.id', $idProv)
                ->where('cities.id', $idCity)
    			->groupBy('districts.dist_name')
    			->get();
        return view('front.cityXdist', compact('dt'));
    }
}

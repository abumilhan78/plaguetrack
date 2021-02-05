<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class globalController extends Controller
{
    public function dataGlobal()
    {
    	$datas =  Http::get('https://api.kawalcorona.com/')->json();
    	$dt = [];
    	foreach ($datas as $key => $value) {
    		$raw = $value['attributes'];
    		$res = [
    			'Negara' => $raw['Country_Region'],
    			'Positif' => $raw['Confirmed'],
    			'Meninggal' => $raw['Deaths'],
    			'Sembuh' => $raw['Recovered']
    		];
    		array_push($dt, $res);
    	}

    	$result = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'Berhasil'
    	];

    	return response()->json($result, 200);
    }
}

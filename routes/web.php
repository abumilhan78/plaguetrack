<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SubdistrictController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\Report\ReportController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [frontController::class, 'index']);
Route::group(['prefix' => 'detail'], function(){
	Route::get('/{prov}', [frontController::class, 'singleCity']);
	Route::get('/{prov}/{city}', [frontController::class, 'singleDist']);
});


Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function (){
	Route::get('/', function(){
		return view('admin.index');
	});
	
	Route::get('/print', [ReportController::class, 'printPdf']);

	Route::resource('/province', ProvinceController::class);

	Route::resource('/city', CityController::class);

	Route::resource('/district', DistrictController::class);

	Route::resource('/subdistrict', SubdistrictController::class);

	Route::resource('/rw', RwController::class);

	Route::resource('/local', TrackController::class);

	Route::group(['prefix' => 'report'], function (){
		Route::get('/local-pdf', [ReportController::class, 'pdfLocal']);
		Route::get('/local-xls', [ReportController::class, 'xlsLocal']);
		Route::get('/prov', [ReportController::class, 'pdfProv']);
	});

	Route::get('/global', function(){
		return view('admin.globalCase.index');
	});

	
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function (){
	Route::get('/', function(){
		return view('admin.index');
	});

	Route::resource('/province', ProvinceController::class);

	Route::resource('/city', CityController::class);

	Route::resource('/district', DistrictController::class);

	Route::get('/local', function(){
		return view('admin.localCase.index');
	});

	Route::get('/global', function(){
		return view('admin.globalCase.index');
	});

	

	Route::get('/subdistrict', function(){
		return view('admin.subDistrict.index');
	});

	Route::get('/rw', function(){
		return view('admin.rw.index');
	});
});
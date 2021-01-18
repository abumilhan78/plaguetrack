<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
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

Route::resource('province', ProvinceController::class);

Route::view('/tes', 'admin.index')->name('tes');
Route::view('/tabel', 'admin.case.index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function (){
	Route::get('/', function(){
		return view('admin.index');
	});

	Route::get('/local', function(){
		return view('admin.localCase.index');
	});

	Route::get('/global', function(){
		return view('admin.globalCase.index');
	});

	Route::get('/province', function(){
		return view('admin.province.index');
	});

	Route::get('/city', function(){
		return view('admin.city.index');
	});

	Route::get('/district', function(){
		return view('admin.district.index');
	});

	Route::get('/subdistrict', function(){
		return view('admin.subDistrict.index');
	});

	Route::get('/rw', function(){
		return view('admin.rw.index');
	});
});
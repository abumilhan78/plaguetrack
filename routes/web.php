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

	Route::get('/case', function(){
		return view('admin.case.index');
	});
});
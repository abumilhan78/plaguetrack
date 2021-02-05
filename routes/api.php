<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\plagueAPI;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\globalController;
use App\Http\Controllers\API\CityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('data', plagueAPI::class);

Route::get('search/{key}', [plagueAPI::class, 'search']);

Route::get('/province/{id}', [ApiController::class, 'provXcity']);
// Route::post('/province/store', [ProvinceController::class, 'store']);
// Route::put('/province/update/{id}', [ProvinceController::class, 'update']);
// Route::delete('/province/{id}', [ProvinceController::class, 'destroy']);

//Statistik Jamak/Kelompok
Route::get('/indonesia', [ApiController::class, 'sumTrack']);
Route::get('/rw', [ApiController::class, 'sumRW']);
Route::get('/kelurahan', [ApiController::class, 'sumSubDist']);
Route::get('/kecamatan', [ApiController::class, 'sumDist']);
Route::get('/kota', [ApiController::class, 'sumCity']);
Route::get('/provinsi', [ApiController::class, 'sumProv']);
Route::get('/global', [globalController::class, 'dataGlobal']);

//Statistik Tunggal
Route::get('/rw/{id}', [ApiController::class, 'singleRW']);
Route::get('/kelurahan/{id}', [ApiController::class, 'singleSubDist']);
Route::get('/kecamatan/{id}', [ApiController::class, 'singleDist']);
Route::get('/kota/{id}', [ApiController::class, 'singleCity']);
Route::get('/provinsi/{id}', [ApiController::class, 'singleProv']);
Route::get('/positif', [ApiController::class, 'positif']);
Route::get('/meninggal', [ApiController::class, 'meninggal']);
Route::get('/sembuh', [ApiController::class, 'sembuh']);
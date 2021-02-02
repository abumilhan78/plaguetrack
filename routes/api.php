<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\plagueAPI;
use App\Http\Controllers\API\ApiController;
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

Route::get('/prov', [ApiController::class, 'sumProvince']);
Route::get('/province/{id}', [ApiController::class, 'provXcity']);
// Route::post('/province/store', [ProvinceController::class, 'store']);
// Route::put('/province/update/{id}', [ProvinceController::class, 'update']);
// Route::delete('/province/{id}', [ProvinceController::class, 'destroy']);

Route::get('/track', [ApiController::class, 'sumTrack']);

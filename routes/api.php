<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\plagueAPI;
use App\Http\Controllers\API\ProvinceController;

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

Route::get('/province', [ProvinceController::class, 'index']);
Route::post('/province/store', [ProvinceController::class, 'store']);
Route::get('/province/{id?}', [ProvinceController::class, 'show']);
Route::put('/province/update/{id?}', [ProvinceController::class, 'update']);
Route::delete('/province/{id?}', [ProvinceController::class, 'destroy']);
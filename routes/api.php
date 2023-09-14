<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\ProvinceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Exemplos de definição de rotas para controladores
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::post('/provinces', [ProvinceController::class, 'store']);
Route::get('/provinces/{id}', [ProvinceController::class, 'show']);
Route::put('/provinces/{id}', [ProvinceController::class, 'update']);
Route::delete('/provinces/{id}', [ProvinceController::class, 'destroy']);

Route::get('/cities', [CityController::class, 'index']);
Route::post('/cities', [CityController::class, 'store']);
Route::get('/cities/{id}', [CityController::class, 'show']);
Route::put('/cities/{id}', [CityController::class, 'update']);
Route::delete('/cities/{id}', [CityController::class, 'destroy']);

Route::get('/neighborhoods', [NeighborhoodController::class, 'index']);
Route::post('/neighborhoods', [NeighborhoodController::class, 'store']);
Route::get('/neighborhoods/{id}', [NeighborhoodController::class, 'show']);
Route::put('/neighborhoods/{id}', [NeighborhoodController::class, 'update']);
Route::delete('/neighborhoods/{id}', [NeighborhoodController::class, 'destroy']);

Route::get('/municipalities', [MunicipalityController::class, 'index']);
Route::post('/municipalities', [MunicipalityController::class, 'store']);
Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
Route::put('/municipalities/{id}', [MunicipalityController::class, 'update']);
Route::delete('/municipalities/{id}', [MunicipalityController::class, 'destroy']);

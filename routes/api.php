<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\MedicineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/search/client/{field}/{query}', [ClientController::class, 'search']);
Route::apiResource('clients',ClientController::class);
Route::apiResource('medicine',MedicineController::class);    
Route::apiResource('medicines/category',MedicineCategoryController::class);
<?php

use App\Http\Controllers\Api\V1\ComponentController;
use App\Http\Controllers\Api\V1\InspectionController;
use App\Http\Controllers\Api\V1\TurbineController;
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

Route::get('/components', [ComponentController::class, 'index']);
Route::post('/components', [ComponentController::class, 'store']);
Route::get('/components/{id}', [ComponentController::class, 'show']);

Route::get('/turbines', [TurbineController::class, 'index']);
Route::post('/turbines', [TurbineController::class, 'store']);
Route::get('/turbines/{id}', [TurbineController::class, 'show']);
Route::post('/turbines/{id}/attach-component', [TurbineController::class, 'attachComponent']);
Route::post('/turbines/{id}/detach-component', [TurbineController::class, 'detachComponent']);


Route::get('/inspections', [InspectionController::class, 'index']);
Route::post('/inspections', [InspectionController::class, 'store']);
Route::get('/inspections/{id}', [InspectionController::class, 'show']);
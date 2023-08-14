<?php

use App\Http\Controllers\Api\V1\AuthController;
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

Route::post('/auth', [AuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('components')->group(function () {  
        Route::get('/', [ComponentController::class, 'index']);
        Route::post('/', [ComponentController::class, 'store']);
        Route::get('/{id}', [ComponentController::class, 'show']);
    });

    Route::prefix('turbines')->group(function () {  
        Route::get('/', [TurbineController::class, 'index']);
        Route::post('/', [TurbineController::class, 'store']);
        Route::get('/{id}', [TurbineController::class, 'show']);
        Route::post('/{id}/attach-component', [TurbineController::class, 'attachComponent']);
        Route::post('/{id}/detach-component', [TurbineController::class, 'detachComponent']);
    });


    Route::prefix('inspections')->group(function () {  
        Route::get('/', [InspectionController::class, 'index']);
        Route::post('/', [InspectionController::class, 'store']);
        Route::get('/{id}', [InspectionController::class, 'show']);
    });

});
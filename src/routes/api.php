<?php


use Illuminate\Support\Facades\Route;
use Shumonpal\LaravelAppTracker\Controllers\API\LicenceKeyAPIController;
use Shumonpal\LaravelAppTracker\Controllers\API\LicenceUserAPIController;

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

Route::prefix('api/app-tracker')->middleware('api')->group(function () {
    Route::post('licence-key-verify', [LicenceKeyAPIController::class, 'verify']);
    Route::get('licence-key-verify', [LicenceKeyAPIController::class, 'findByDomain']);
    Route::post('licence-users', [LicenceUserAPIController::class, 'store']);

});



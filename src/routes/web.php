<?php

use Illuminate\Support\Facades\Route;
use Shumonpal\LaravelAppTracker\Controllers\API\LicenceKeyAPIController;
use Shumonpal\LaravelAppTracker\Controllers\LicenceKeyController;
use Shumonpal\LaravelAppTracker\Controllers\LicenceUserController;

// Route::prefix('project-security')->middleware('web')->group(function(){
//     Route::get('/licences', [LaravelAppTrackerController::class, 'create']);
//     Route::post('/licences', [LaravelAppTrackerController::class, 'storeLicences'])->name('project-security.licences');
// });

Route::prefix('app-tracker')->name('app-tracker.')->middleware('web')->group(function () {
    Route::resource('licence-keys', LicenceKeyController::class)->only(['index', 'store', 'destroy']);
    Route::resource('licence-users', LicenceUserController::class)->only(['index', 'destroy']);

});

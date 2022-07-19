<?php

use App\Http\Controllers\ReportController;



Route::group([ 'prefix' => 'report' ], function () {

    Route::get('/user', [ReportController::class, 'user'])->name("report-user");
    Route::get('/driver', [ReportController::class, 'driver'])->name("report-driver");
    Route::get('/vehicle', [ReportController::class, 'vehicle'])->name("report-vehicle");
    Route::get('/vehicle-request', [ReportController::class, 'vehicle_request'])->name("report-vehicle-request");

});
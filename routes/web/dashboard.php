<?php

use App\Http\Controllers\DashboardController;


Route::group([ 'prefix' => 'dashboard' ], function () {

    Route::get('/', [DashboardController::class, 'index'])->name("dashboard");

});
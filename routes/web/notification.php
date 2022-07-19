<?php

use App\Http\Controllers\NotificationController;


Route::group([ 'prefix' => 'notification' ], function () {

    Route::get('/', [NotificationController::class, 'index'])->name("notification");
    Route::get('/all', [NotificationController::class, 'all'])->name("all-notification");
    Route::get('/detail{id}', [NotificationController::class, 'detail'])->name("detail-notification");

});
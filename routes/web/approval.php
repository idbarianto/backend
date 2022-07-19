<?php

use App\Http\Controllers\ApprovalController;


Route::group([ 'prefix' => 'approval' ], function () {

    Route::get('/', [ApprovalController::class, 'index'])->name("approval");
    Route::get('/waiting', [ApprovalController::class, 'waiting'])->name("waiting-approval");
    Route::get('/approve', [ApprovalController::class, 'approve'])->name("approve-approval");
    Route::get('/detail/{id}', [ApprovalController::class, 'detail'])->name("detail-approval");

});
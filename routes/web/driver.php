<?php

use App\Http\Controllers\DriverController;


Route::group([ 'prefix' => 'driver' ], function () {

    Route::get('/', [DriverController::class, 'index'])->name("driver");
    Route::get('/form', [DriverController::class, 'form'])->name("form-driver");
    Route::post('/save', [DriverController::class, 'save'])->name("save-driver");

    Route::get('/edit/{id}', [DriverController::class, 'edit'])->name("edit-driver");
    Route::post('/update/{id}', [DriverController::class, 'update'])->name("update-driver");

    Route::delete('/delete', [DriverController::class, 'delete'])->name("delete-driver");

});
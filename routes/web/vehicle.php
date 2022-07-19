<?php

use App\Http\Controllers\VehicleController;


Route::group([ 'prefix' => 'vehicle' ], function () {

    Route::get('/', [VehicleController::class, 'index'])->name("vehicle");
    Route::get('/form', [VehicleController::class, 'form'])->name("form-vehicle");
    Route::post('/save', [VehicleController::class, 'save'])->name("save-vehicle");

    Route::get('/edit/{id}', [VehicleController::class, 'edit'])->name("edit-vehicle");
    Route::post('/update/{id}', [VehicleController::class, 'update'])->name("update-vehicle");

    Route::delete('/delete', [VehicleController::class, 'delete'])->name("delete-vehicle");

});
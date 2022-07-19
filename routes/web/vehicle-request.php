<?php

use App\Http\Controllers\VehicleRequestController;


Route::group([ 'prefix' => 'vehicle-request' ], function () {


    Route::get('/', [VehicleRequestController::class, 'index'])->name("vehicle-request");

    Route::get('/form', [VehicleRequestController::class, 'form'])->name("form-vehicle-request");
    Route::post('/save', [VehicleRequestController::class, 'save'])->name("save-vehicle-request");

    Route::get('/edit/{id}', [VehicleRequestController::class, 'edit'])->name("edit-vehicle-request");
    Route::post('/update/{id}', [VehicleRequestController::class, 'update'])->name("update-vehicle-request");

    Route::delete('/delete', [VehicleRequestController::class, 'delete'])->name("delete-vehicle-request");
    

});
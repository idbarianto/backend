<?php

use App\Http\Controllers\UserController;


Route::group([ 'prefix' => 'user' ], function () {

    Route::get('/', [UserController::class, 'index'])->name("user");
    Route::get('/form', [UserController::class, 'form'])->name("form-user");
    Route::post('/save', [UserController::class, 'save'])->name("save-user");

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name("edit-user");
    Route::post('/update/{id}', [UserController::class, 'update'])->name("update-user");

    Route::delete('/delete', [UserController::class, 'delete'])->name("delete-user");

});
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return redirect('/dashboard');
});


Route::group(['prefix' => 'auth'], function () {

    Route::get('/sign-in', [App\Http\Controllers\AuthController::class, 'sign_in'])->name("sign-in");
    Route::get('/sign-out', [App\Http\Controllers\AuthController::class, 'sign_out'])->name("sign-out");

});



require_once __DIR__ . '/web/dashboard.php';
require_once __DIR__ . '/web/vehicle.php';
require_once __DIR__ . '/web/vehicle-request.php';
require_once __DIR__ . '/web/notification.php';
require_once __DIR__ . '/web/approval.php';
require_once __DIR__ . '/web/report.php';
require_once __DIR__ . '/web/user.php';



Route::group(['middleware' => 'auth'], function () {
 

});


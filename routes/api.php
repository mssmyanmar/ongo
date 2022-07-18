<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('staff/v1/')->group(function () {
    Route::post('/login',  [App\Http\Controllers\api\v1\LoginController::class, 'login'])->name('staffLogin');
    Route::middleware('auth:api')->group(function () {
        Route::get('/allClients',  [App\Http\Controllers\api\v1\ClientController::class, 'index'])->name('allClients');
        Route::get('/check_status/{staff_id}',  [App\Http\Controllers\api\v1\UserController::class, 'show'])->name('check_status');
        Route::get('/sync',  [App\Http\Controllers\api\v1\SyncController::class, 'sync'])->name('sync');
    });
    
});
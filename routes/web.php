<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'postLoginForm'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::middleware('user')->group(function () {
    Route::resource('users', UserController::class);
    Route::post('/changeStatus', [App\Http\Controllers\UserController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/activeUser', [App\Http\Controllers\UserController::class, 'activeUser'])->name('activeUser');
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'report'])->name('report');
    Route::post('/searchTransaction', [App\Http\Controllers\ReportController::class, 'searchTransaction'])->name('searchTransaction');
});
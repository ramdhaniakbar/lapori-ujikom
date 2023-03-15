<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Backsite\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', LandingController::class);

Route::middleware('guest', 'guest:petugas')->group(function () {
    // login page
    Route::resource('login', LoginController::class);

    // register page
    Route::resource('register', RegisterController::class);
});

Route::middleware(['authGuards'])->group(function () {

    Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['petugas_or_admin']], function () {

        // dashboard
        Route::resource('dashboard', DashboardController::class);
    });

    // lapor
    Route::resource('lapor', UserReportController::class);

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

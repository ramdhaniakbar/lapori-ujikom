<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\KategoriPengaduanController;
use App\Http\Controllers\Backsite\PengaduanController;
use App\Http\Controllers\Backsite\TanggapanController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\PengaduanUserController;

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

        // kategori pengaduan
        Route::resource('kategori_pengaduan', KategoriPengaduanController::class);

        // pengaduan
        Route::resource('pengaduan', PengaduanController::class);

        // kategori pengaduan
        Route::resource('tanggapan', TanggapanController::class);

        // kategori pengaduan
        Route::resource('user', UserController::class);
    });

    // lapor
    Route::get('laporan_kamu', [PengaduanUserController::class, 'laporan_kamu'])->name('laporan_kamu');
    Route::resource('lapor', PengaduanUserController::class);

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HakimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JaksaController;
use App\Http\Controllers\NarapidanaController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/register', [RegisterController::class, 'index'])->name('register');
//Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware(['auth', 'web'])->group(function() {

    /**
     * Route Kelola Data Dashboard
     */
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', function() {
            return view('pages.dashboard.index');
        })->name('dashboard.index');
    });

    /**
     * Route Kelola Data Biodata
     */
    Route::prefix('/biodata')->group(function () {
        Route::get('/', [BiodataController::class, 'index'])->name('biodata.index');
        Route::get('/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
        Route::post('/', [BiodataController::class, 'store'])->name('biodata.store');
    });

    /**
     * Route Kelola Data Pengguna
     */
    Route::prefix('/pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::get('/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::post('/', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::put('/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::delete('/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.delete');
    });

    /**
     * Route Kelola Data Hakim
     */
    Route::prefix('/hakim')->group(function () {
        Route::get('/', [HakimController::class, 'index'])->name('hakim.index');
        Route::get('/create', [HakimController::class, 'create'])->name('hakim.create');
        Route::get('/{hakim}/edit', [HakimController::class, 'edit'])->name('hakim.edit');
        Route::post('/', [HakimController::class, 'store'])->name('hakim.store');
        Route::put('/{hakim}', [HakimController::class, 'update'])->name('hakim.update');
        Route::delete('/{hakim}', [HakimController::class, 'destroy'])->name('hakim.delete');
    });

    /**
     * Route Kelola Data Jaksa
     */
    Route::prefix('/jaksa')->group(function () {
        Route::get('/', [JaksaController::class, 'index'])->name('jaksa.index');
        Route::get('/create', [JaksaController::class, 'create'])->name('jaksa.create');
        Route::get('/{jaksa}/edit', [JaksaController::class, 'edit'])->name('jaksa.edit');
        Route::post('/', [JaksaController::class, 'store'])->name('jaksa.store');
        Route::put('/{jaksa}', [JaksaController::class, 'update'])->name('jaksa.update');
        Route::delete('/{jaksa}', [JaksaController::class, 'destroy'])->name('jaksa.delete');
    });

    /**
     * Route Kelola Data Narapidana
     */
    Route::prefix('/narapidana')->group(function () {
        Route::get('/', [NarapidanaController::class, 'index'])->name('narapidana.index');
        Route::get('/create', [NarapidanaController::class, 'create'])->name('narapidana.create');
        Route::get('/{narapidana}/edit', [NarapidanaController::class, 'edit'])->name('narapidana.edit');
        Route::post('/', [NarapidanaController::class, 'store'])->name('narapidana.store');
        Route::put('/{narapidana}', [NarapidanaController::class, 'update'])->name('narapidana.update');
        Route::delete('/{narapidana}', [NarapidanaController::class, 'destroy'])->name('narapidana.delete');

    });

    /**
     * Route Kelola Data Sidang
     */
    Route::prefix('/sidang')->group(function () {
        Route::get('/', function() {
            return view('pages.sidang.index');
        })->name('sidang.index');

        Route::get('/create', function() {
            return view('pages.sidang.create');
        })->name('sidang.create');

        Route::get('/{sidang}/edit', function() {
            return view('pages.sidang.edit');
        })->name('sidang.edit');

        Route::delete('/delete/{sidang}', function() {
            return null;
        })->name('sidang.delete');
    });

    /**
     * Route Layanan Kunjungan
     */
    Route::prefix('/kunjungan')->group(function () {
        Route::get('/', function() {
            return view('pages.kunjungan.index');
        })->name('kunjungan.index');

        Route::get('/create', function() {
            return view('pages.kunjungan.create');
        })->name('kunjungan.create');

        Route::get('/{kunjungan}/edit', function() {
            return view('pages.kunjungan.edit');
        })->name('kunjungan.edit');

        Route::delete('/delete/{kunjungan}', function() {
            return null;
        })->name('kunjungan.delete');

        Route::post('/verify/{kunjungan}', function() {
            return null;
        })->name('kunjungan.verify');
    });

});

<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPengunjungController;
use App\Http\Controllers\HakimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JaksaController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\NarapidanaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SidangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'web'])->group(function() {

    /**
     * Route Kelola Data Dashboard
     */
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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
        Route::get('/', [SidangController::class, 'index'])->name('sidang.index');
        Route::get('/create', [SidangController::class, 'create'])->name('sidang.create');
        Route::get('/{sidang}/edit', [SidangController::class, 'edit'])->name('sidang.edit');
        Route::post('/', [SidangController::class, 'store'])->name('sidang.store');
        Route::put('/{sidang}', [SidangController::class, 'update'])->name('sidang.update');
        Route::delete('/{sidang}', [SidangController::class, 'destroy'])->name('sidang.delete');

    });

    /**
     * Route Kunjungan
     */
    Route::prefix('/kunjungan')->group(function () {
        Route::get('/', [KunjunganController::class, 'index'])->name('kunjungan.index');
        Route::get('/create', [KunjunganController::class, 'create'])->name('kunjungan.create');
        Route::get('/{kunjungan}/edit', [KunjunganController::class, 'edit'])->name('kunjungan.edit');
        Route::post('/', [KunjunganController::class, 'store'])->name('kunjungan.store');
        Route::put('/{kunjungan}', [KunjunganController::class, 'update'])->name('kunjungan.update');
        Route::delete('/{kunjungan}', [KunjunganController::class, 'destroy'])->name('kunjungan.delete');

        Route::get('/verifikasi/{kunjungan}', [KunjunganController::class, 'createVerifikasi'])->name('kunjungan.verifikasi.create');
        Route::post('/verifikasi', [KunjunganController::class, 'storeVerifikasi'])->name('kunjungan.verifikasi.store');
        Route::post('/batal-verifikasi', [KunjunganController::class, 'cancelVerifikasi'])->name('kunjungan.cancel_verifikasi');

        Route::post('/waktu-kunjungan/', [KunjunganController::class, 'storeWaktuKunjungan'])->name('kunjungan.waktu_kunjungan.store');
        Route::delete('/waktu-kunjungan/{waktuKunjungan}', [KunjunganController::class, 'destroyWaktuKunjungan'])->name('kunjungan.waktu_kunjungan.delete');
    });

    /**
     * Route Kunjungan
     */
    Route::prefix('/data-pengunjung')->group(function () {
        Route::get('/', [DataPengunjungController::class, 'index'])->name('dataPengunjung.index');
        Route::get('/create', [DataPengunjungController::class, 'create'])->name('dataPengunjung.create');
        Route::get('/{dataPengunjung}/edit', [DataPengunjungController::class, 'edit'])->name('dataPengunjung.edit');
        Route::post('/', [DataPengunjungController::class, 'store'])->name('dataPengunjung.store');
        Route::put('/{data_pengunjung}', [DataPengunjungController::class, 'update'])->name('dataPengunjung.update');
        Route::delete('/{data_pengunjung}', [DataPengunjungController::class, 'destroy'])->name('dataPengunjung.delete');
    });

});

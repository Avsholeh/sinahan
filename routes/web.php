<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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
        Route::get('/', function() {
            return view('pages.biodata.index');
        })->name('biodata.index');

        Route::get('/edit', function() {
            return view('pages.biodata.edit');
        })->name('biodata.edit');
    });

    /**
     * Route Kelola Data Pengguna
     */
    Route::prefix('/pengguna')->group(function () {
        Route::get('/', function() {
            return view('pages.pengguna.index');
        })->name('pengguna.index');

        Route::get('/create', function() {
            return view('pages.pengguna.create');
        })->name('pengguna.create');

        Route::get('/{user}/edit', function() {
            return view('pages.pengguna.edit');
        })->name('pengguna.edit');

        Route::delete('/delete/{user}', function() {
            return null;
        })->name('pengguna.delete');
    });

    /**
     * Route Kelola Data Hakim
     */
    Route::prefix('/hakim')->group(function () {
        Route::get('/', function() {
            return view('pages.hakim.index');
        })->name('hakim.index');

        Route::get('/create', function() {
            return view('pages.hakim.create');
        })->name('hakim.create');

        Route::get('/{hakim}/edit', function() {
            return view('pages.hakim.edit');
        })->name('hakim.edit');

        Route::delete('/delete/{hakim}', function() {
            return null;
        })->name('hakim.delete');
    });

    /**
     * Route Kelola Data Jaksa
     */
    Route::prefix('/jaksa')->group(function () {
        Route::get('/', function() {
            return view('pages.jaksa.index');
        })->name('jaksa.index');

        Route::get('/create', function() {
            return view('pages.jaksa.create');
        })->name('jaksa.create');

        Route::get('/{jaksa}/edit', function() {
            return view('pages.jaksa.edit');
        })->name('jaksa.edit');

        Route::delete('/delete/{jaksa}', function() {
            return null;
        })->name('jaksa.delete');
    });

    /**
     * Route Kelola Data Narapidana
     */
    Route::prefix('/narapidana')->group(function () {
        Route::get('/', function() {
            return view('pages.narapidana.index');
        })->name('narapidana.index');

        Route::get('/create', function() {
            return view('pages.narapidana.create');
        })->name('narapidana.create');

        Route::get('/{narapidana}/edit', function() {
            return view('pages.narapidana.edit');
        })->name('narapidana.edit');

        Route::delete('/delete/{narapidana}', function() {
            return null;
        })->name('narapidana.delete');
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

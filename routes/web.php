<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware(['auth', 'web'])->group(function() {


    Route::prefix('/dashboard')->group(function () {
        Route::get('/', function() {
            return view('pages.dashboard.index');
        })->name('dashboard.index');
    });

    Route::prefix('/biodata')->group(function () {
        Route::get('/', function() {
            return view('pages.biodata.index');
        })->name('biodata.index');

        Route::get('/edit', function() {
            return view('pages.biodata.edit');
        })->name('biodata.edit');
    });

    Route::prefix('/pengguna')->group(function () {
        Route::get('/', function() {
            return view('pages.pengguna.index');
        })->name('pengguna.index');

        Route::get('/create', function() {
            return view('pages.pengguna.create');
        })->name('pengguna.add');
    });

    Route::prefix('/hakim')->group(function () {
        Route::get('/', function() {
            return view('hakim.index');
        })->name('hakim.index');
    });

    Route::prefix('/jaksa')->group(function () {
        Route::get('/', function() {
            return view('pages.jaksa.index');
        })->name('jaksa.index');
    });

    Route::prefix('/narapidana')->group(function () {
        Route::get('/', function() {
            return view('pages.narapidana.index');
        })->name('narapidana.index');
    });

    Route::prefix('/kunjungan')->group(function () {
        Route::get('/', function() {
            return view('pages.kunjungan.index');
        })->name('kunjungan.index');
    });

});

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

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function() {
        return view('dashboard.index');
    })->name('dashboard.index');
});

Route::prefix('/biodata')->group(function () {
    Route::get('/', function() {
        return view('biodata.index');
    })->name('biodata.index');
});

Route::prefix('/pengguna')->group(function () {
    Route::get('/', function() {
        return view('pengguna.index');
    })->name('pengguna.index');

    Route::get('/add', function() {
        return view('pengguna.index');
    })->name('pengguna.add');
});

Route::prefix('/jabatan')->group(function () {
    Route::get('/', function() {
        return view('jabatan.index');
    })->name('jabatan.index');
});

Route::prefix('/hak-akses')->group(function () {
    Route::get('/', function() {
        return view('hak-akses.index');
    })->name('hak-akses.index');
});

Route::prefix('/hakim')->group(function () {
    Route::get('/', function() {
        return view('hakim.index');
    })->name('hakim.index');
});

Route::prefix('/jaksa')->group(function () {
    Route::get('/', function() {
        return view('jaksa.index');
    })->name('jaksa.index');
});

Route::prefix('/narapidana')->group(function () {
    Route::get('/', function() {
        return view('narapidana.index');
    })->name('narapidana.index');
});

Route::prefix('/kunjungan')->group(function () {
    Route::get('/', function() {
        return view('kunjungan.index');
    })->name('kunjungan.index');
});

Route::prefix('/dokumen')->group(function () {
    Route::get('/', function() {
        return view('dokumen.index');
    })->name('dokumen.index');
});

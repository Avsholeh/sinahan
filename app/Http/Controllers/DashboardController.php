<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\Jaksa;
use App\Models\Kunjungan;
use App\Models\Pengguna;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
            $totalKunjungan = Kunjungan::all()->count();
            $totalPengguna = Pengguna::all()->count();
            $totalHakim = Hakim::all()->count();
            $totalJaksa = Jaksa::all()->count();

            return view('pages.dashboard.index',
                compact('totalKunjungan', 'totalPengguna', 'totalHakim', 'totalJaksa'));
        } else {

            $kunjungans = auth()->user()->kunjungan()->orderBy('dibuat_pada', 'desc');

            $lastKunjungan = Kunjungan::where('pengguna_id', auth()->user()->id)
                ->orderBy('dibuat_pada', 'desc')->limit(3)->get();

            return view('pages.dashboard.index',
                compact('kunjungans', 'lastKunjungan'));
        }
    }
}

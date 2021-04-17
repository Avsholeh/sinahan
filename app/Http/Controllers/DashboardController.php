<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\Jaksa;
use App\Models\Kunjungan;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $grafiks = $this->grafik();

        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
            $totalKunjungan = Kunjungan::all()->count();
            $totalPengguna = Pengguna::all()->count();
            $totalHakim = Hakim::all()->count();
            $totalJaksa = Jaksa::all()->count();

            $lastKunjungan = Kunjungan::orderBy('dibuat_pada', 'desc')->limit(3)->get();

            return view('pages.dashboard.index',
                compact('totalKunjungan', 'totalPengguna', 'totalHakim', 'totalJaksa',
                    'lastKunjungan', 'grafiks'));
        } else {

            $kunjungans = auth()->user()->kunjungan()->orderBy('dibuat_pada', 'desc');

            $lastKunjungan = Kunjungan::where('pengguna_id', auth()->user()->id)
                ->orderBy('dibuat_pada', 'desc')->limit(3)->get();

            return view('pages.dashboard.index',
                compact('kunjungans', 'lastKunjungan', 'grafiks'));
        }
    }

    private function grafik()
    {
        $bulan = DB::raw("DATE_FORMAT(dibuat_pada , '%M') AS bulan");
        $total = DB::raw("count(DATE_FORMAT(dibuat_pada , '%M')) as total");
        $groupByRaw = "DATE_FORMAT(dibuat_pada , '%M')";

        return Kunjungan::select($bulan, $total)->groupByRaw($groupByRaw)->get();
    }
}

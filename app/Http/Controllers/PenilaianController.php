<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::all();
        return view('pages.penilaian.index', compact('penilaians'));
    }

    public function store(Request $request)
    {
        Penilaian::create([
            'user_id' => auth()->user()->id,
            'penilaian' => $request->penilaian,
        ]);

        return redirect()->back()->with('status', 'Penilaian berhasil ditambahkan.');
    }
}

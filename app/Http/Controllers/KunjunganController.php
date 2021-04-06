<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\DataPengunjungKunjungan;
use App\Models\Kunjungan;
use App\Models\Narapidana;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// TODO fix hapus kunjungan/index.php

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $kunjungans = Kunjungan::orderBy('dibuat_pada', 'desc')->paginate(10);
        return view('pages.kunjungan.index', compact('kunjungans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $narapidanas = Narapidana::where('status', Narapidana::AKTIF)->get();
        $dataPengunjungs = DataPengunjung::where('pengguna_id', auth()->user()->id)->get();

        return view('pages.kunjungan.create', compact('narapidanas', 'dataPengunjungs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_pengunjung' => 'required',
            'narapidana_id' => 'required',
            'pengguna_id' => 'required',
            'keperluan' => 'required',
        ]);

        //dd($request->all());

        $kunjungan = Kunjungan::create($request->only([
            'narapidana_id', 'pengguna_id', 'keperluan'
        ]));

        if ($kunjungan) {
            foreach ($request->data_pengunjung as $data_pengunjung_id) {
                DataPengunjungKunjungan::create([
                    'data_pengunjung_id' => $data_pengunjung_id,
                    'kunjungan_id' => $kunjungan->id
                ]);
            }
        }

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan telah berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param Kunjungan $kunjungan
     * @return Response
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Kunjungan $kunjungan
     * @return Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        return view('pages.kunjungan.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Kunjungan $kunjungan
     * @return Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Kunjungan $kunjungan
     * @return Response
     * @throws Exception
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan telah berhasil dihapus');
    }

    public function verify(Kunjungan $kunjungan)
    {
        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan telah berhasil diverifikasi');
    }

    public function cancelVerify(Kunjungan $kunjungan)
    {
        return redirect()->route('kunjungan.index')
            ->with('success', 'Verifikasi Kunjungan telah dibatalkan');
    }
}

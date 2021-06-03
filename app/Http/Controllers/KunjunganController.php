<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\DataPengunjungKunjungan;
use App\Models\Kunjungan;
use App\Models\Narapidana;
use App\Models\Pengguna;
use App\Models\WaktuKunjungan;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
            $kunjungans = Kunjungan::orderBy('id', 'desc')->paginate(10);
        }

        if (auth()->user()->roles === Pengguna::ROLES_USER) {
            $kunjungans = Kunjungan::where('pengguna_id', auth()->user()->id)
                ->orderBy('id', 'desc')->paginate(10);
        }

        return view('pages.kunjungan.index', compact('kunjungans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
            $dataPengunjungs = DataPengunjung::all();
        } else {
            $dataPengunjungs = DataPengunjung::where('pengguna_id', auth()->user()->id)->get();
        }
        $narapidanas = Narapidana::where('status', Narapidana::AKTIF)->get();
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

        $kunjungan = Kunjungan::create($request->only([
            'narapidana_id', 'pengguna_id', 'keperluan', 'dibuat_pada'
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
        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
            $dataPengunjungs = DataPengunjung::all();
        } else {
            $dataPengunjungs = DataPengunjung::where('pengguna_id', auth()->user()->id)->get();
        }
        $narapidanas = Narapidana::where('status', Narapidana::AKTIF)->get();

//        dd($kunjungan->dataPengunjungKunjungan->contains('data_pengunjung_id', 2));
        return view('pages.kunjungan.edit', compact('kunjungan', 'dataPengunjungs', 'narapidanas'));
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
        $request->validate([
            'data_pengunjung' => 'required',
            'narapidana_id' => 'required',
            'pengguna_id' => 'required',
            'keperluan' => 'required',
        ]);

//        $kunjungan = Kunjungan::create($request->only([
//            'narapidana_id', 'pengguna_id', 'keperluan'
//        ]));

        $kunjungan->update([
            'narapidana_id' => $request->narapidana_id,
            'pengguna_id' => $request->pengguna_id,
            'keperluan' => $request->keperluan,
        ]);

        $deletedDataPengunjung = DataPengunjungKunjungan::where('kunjungan_id', $kunjungan->id)->delete();

        if (!$deletedDataPengunjung or !$kunjungan) abort(404);

//        if ($kunjungan) {
            foreach ($request->data_pengunjung as $data_pengunjung_id) {
                DataPengunjungKunjungan::create([
                    'data_pengunjung_id' => $data_pengunjung_id,
                    'kunjungan_id' => $kunjungan->id
                ]);
            }
//        }

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan telah berhasil diperbarui');
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
        DataPengunjungKunjungan::where('kunjungan_id', $kunjungan->id)->delete();
        WaktuKunjungan::where('kunjungan_id', $kunjungan->id)->delete();
        $kunjungan->delete();
        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan telah berhasil dihapus');
    }

    public function genPDF(Kunjungan $kunjungan)
    {
        $pdf = PDF::loadView('pdf.kunjungan', compact('kunjungan'));
        $pdfName = hash('adler32', $kunjungan->id) . '-surat-kunjungan.pdf';
//            Hash::make($kunjungan->id) . '-kunjungan.pdf';
        return $pdf->download($pdfName);
    }

    public function storeVerifikasi(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
        ]);

        $kunjungan = Kunjungan::whereId($request->kunjungan_id)->first();

        if ($kunjungan->waktuKunjungan->count() > 0) {

            $kunjungan->status = Kunjungan::STS_SDH_VERIFIKASI;
            $kunjungan->no_surat = $request->no_surat;
            $kunjungan->save();

            return redirect()->route('kunjungan.index')
                ->with('success', "Kunjungan dari {$kunjungan->pengguna->nama_lengkap} telah berhasil diverifikasi");
        }

        return redirect()->route('kunjungan.verifikasi.create', $request->kunjungan_id)
            ->with('danger', 'Waktu kunjungan belum ditentukan.
            Silahkan tambah waktu kunjungan sebelum diverifikasi');
    }

    public function createVerifikasi(Kunjungan $kunjungan)
    {
        return view('pages.verifikasi.create', compact('kunjungan'));
    }

    public function cancelVerifikasi(Kunjungan $kunjungan)
    {
        return redirect()->route('kunjungan.index')
            ->with('success', 'Verifikasi Kunjungan telah dibatalkan');
    }

    public function storeWaktuKunjungan(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required',
            'tanggal' => 'required',
            'dari_jam' => 'required',
            'hingga_jam' => 'required',

        ]);

        WaktuKunjungan::create($request->only(['kunjungan_id', 'tanggal', 'dari_jam', 'hingga_jam']));

        return redirect()->route('kunjungan.verifikasi.create', $request->kunjungan_id);
    }

    public function destroyWaktuKunjungan(WaktuKunjungan $waktuKunjungan)
    {
        $waktuKunjungan->delete();
        return redirect()->back()
            ->with('success', 'Kunjungan telah berhasil dihapus');
    }
}

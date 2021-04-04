<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataPengunjungController extends Controller
{
    /**
     * Display a listing of the data pengujung.
     *
     * @return Response
     */
    public function index()
    {
//        if (auth()->user()->roles === Pengguna::ROLES_ADMIN) {
//            $dataPengunjungs = DataPengunjung::all();
//        } else {
//            $dataPengunjungs = DataPengunjung::where('pengguna_id', auth()->user()->id);
//        }

        $dataPengunjungs = DataPengunjung::where('pengguna_id', auth()->user()->id);
        return view('pages.data_pengunjung.index', compact('dataPengunjungs'));
    }

    /**
     * Show the form for creating a new data pengujung.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.data_pengunjung.create');
    }

    /**
     * Store a newly created data pengujung in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) {
            $request->validate([
                'pengguna_id' => 'required',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'pekerjaan' => 'required',
                'hubungan' => 'required',
            ]);

            DataPengunjung::create($request->all());

            return redirect()->back()
                ->with('dataPengunjung_success', "Data Pengunjung telah berhasil ditambah.");
        }
    }

    /**
     * Display the specified data pengujung.
     *
     * @param DataPengunjung $dataPengunjung
     * @return Response
     */
    public function show(DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified data pengujung.
     *
     * @param DataPengunjung $dataPengunjung
     * @return Response
     */
    public function edit(DataPengunjung $dataPengunjung)
    {
        return view('pages.data_pengunjung.edit', compact('dataPengunjung'));
    }

    /**
     * Update the specified data pengujung in storage.
     *
     * @param Request $request
     * @param DataPengunjung $dataPengunjung
     * @return Response
     */
    public function update(Request $request, DataPengunjung $dataPengunjung)
    {
        $request->validate([
            'pengguna_id' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'hubungan' => 'required',
        ]);

        $dataPengunjung->update($request->all());

        return redirect()->route('biodata.index')
            ->with('dataPengunjung_success', "Data Pengunjung telah berhasil ditambah.");
    }

    /**
     * Remove the specified data pengujung from storage.
     *
     * @param DataPengunjung $dataPengunjung
     * @return Response
     */
    public function destroy(DataPengunjung $dataPengunjung)
    {
        $dataPengunjung->delete();
        return redirect()->back()
            ->with('dataPengunjung_success', 'Data Pengunjung telah berhasil dihapus');
    }
}

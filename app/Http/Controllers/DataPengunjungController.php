<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

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
        $request->validate([
            'pengguna_id' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'hubungan' => 'required',
            'ktp' => 'required',
        ]);

        $uploadedKtp = Image::make($request->file('ktp')->path())->encode('png');
        $ktp = base64_encode($uploadedKtp);

        DataPengunjung::create([
            'pengguna_id' => $request->pengguna_id,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'hubungan' => $request->hubungan,
            'ktp' => $ktp,
        ]);

        return redirect()->back()
            ->with('dataPengunjung_success', "Data Pengunjung telah berhasil ditambah.");
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
        try {
            $dataPengunjung->delete();
            return redirect()->back()
                ->with('dataPengunjung_success', "Data pengunjung berhasil dihapus");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('dataPengunjung_error', "Data pengunjung tidak dapat dihapus");
        }
    }
}

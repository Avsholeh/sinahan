<?php

namespace App\Http\Controllers;

use App\Models\Narapidana;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NarapidanaController extends Controller
{
    /**
     * Display a listing of the narapidana.
     *
     * @return Response
     */
    public function index()
    {
        $narapidanas = Narapidana::all();
        return view('pages.narapidana.index', compact('narapidanas'));
    }

    /**
     * Show the form for creating a new narapidana.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.narapidana.create');
    }

    public function validateRules(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kebangsaan' => 'required',
            'tempat_tinggal' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'reg_perkara' => 'required',
            'reg_tahanan' => 'required',
            'reg_bukti' => 'required',
//            'kategori' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
//            'foto'=> 'required',
        ]);
    }

    public function defaultFoto(Request $request)
    {
        if (!$request->foto) {
            if ($request->jenis_kelamin === 'Perempuan') {
                return base64_encode(File::get(storage_path('app/public/perempuan.png')));
            } else {
                return base64_encode(File::get(storage_path('app/public/laki.png')));
            }
        } else {
            $image = Image::make($request->file('foto')->path())->encode('png');
            return base64_encode($image);
        }
    }

    /**
     * Store a newly created narapidana in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateRules($request);

        $defaultFoto = $this->defaultFoto($request);

        Narapidana::create([
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kebangsaan' => $request->kebangsaan,
            'tempat_tinggal' => $request->tempat_tinggal,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'reg_perkara' => $request->reg_perkara,
            'reg_tahanan' => $request->reg_tahanan,
            'reg_bukti' => $request->reg_bukti,
//            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('narapidana.index')
            ->with('success', "Narapidana telah berhasil ditambah.");
    }

    /**
     * Display the specified narapidana.
     *
     * @param Narapidana $narapidana
     * @return Response
     */
    public function show(Narapidana $narapidana)
    {
        //
    }

    /**
     * Show the form for editing the specified narapidana.
     *
     * @param Narapidana $narapidana
     * @return Response
     */
    public function edit(Narapidana $narapidana)
    {
        return view('pages.narapidana.edit', compact('narapidana'));
    }

    /**
     * Update the specified narapidana in storage.
     *
     * @param Request $request
     * @param Narapidana $narapidana
     * @return Response
     */
    public function update(Request $request, Narapidana $narapidana)
    {
        $this->validateRules($request);


        $defaultFoto = $this->defaultFoto($request);

        $narapidana->update([
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kebangsaan' => $request->kebangsaan,
            'tempat_tinggal' => $request->tempat_tinggal,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'reg_perkara' => $request->reg_perkara,
            'reg_tahanan' => $request->reg_tahanan,
            'reg_bukti' => $request->reg_bukti,
//            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('narapidana.index')
            ->with('success', 'Narapidana telah berhasil diperbarui');
    }

    /**
     * Remove the specified narapidana from storage.
     *
     * @param Narapidana $narapidana
     * @return Response
     */
    public function destroy(Narapidana $narapidana)
    {
        $narapidana->delete();
        return redirect()->route('narapidana.index')
            ->with('success', 'Narapidana telah berhasil dihapus');
    }
}

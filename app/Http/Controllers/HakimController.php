<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HakimController extends Controller
{
    /**
     * Display a listing of the hakim.
     *
     * @return Response
     */
    public function index()
    {
        $hakims = Hakim::all();
        return view('pages.hakim.index', compact('hakims'));
    }

    /**
     * Show the form for creating a new hakim.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.hakim.create');
    }

    public function validateRules(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pangkat_golongan' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
//            'foto' => 'required',
        ]);
    }

    public function defaultFoto(Request $request)
    {
        if (!$request->foto) {
            if (strtolower($request->jenis_kelamin) === 'wanita') {
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
     * Store a newly created hakim in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateRules($request);

        $defaultFoto = $this->defaultFoto($request);

        Hakim::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pangkat' => explode(' - ', $request->pangkat_golongan)[0],
            'golongan' => explode(' - ', $request->pangkat_golongan)[1],
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('hakim.index')
            ->with('success', "Hakim telah berhasil ditambah.");
    }

    /**
     * Display the specified hakim.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function show(Hakim $hakim)
    {
        //
    }

    /**
     * Show the form for editing the specified hakim.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function edit(Hakim $hakim)
    {
        $pangkatGolongan = $hakim->pangkat . ' - ' . $hakim->golongan;
        return view('pages.hakim.edit', compact('hakim', 'pangkatGolongan'));
    }

    /**
     * Update the specified hakim in storage.
     *
     * @param Request $request
     * @param Hakim $hakim
     * @return Response
     */
    public function update(Request $request, Hakim $hakim)
    {
        $this->validateRules($request);

        $defaultFoto = $this->defaultFoto($request);

        $hakim->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pangkat' => explode(' - ', $request->pangkat_golongan)[0],
            'golongan' => explode(' - ', $request->pangkat_golongan)[1],
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('hakim.index')
            ->with('success', 'Hakim telah berhasil diperbarui');
    }

    /**
     * Remove the specified hakim from storage.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function destroy(Hakim $hakim)
    {
        $hakim->delete();
        return redirect()->route('hakim.index')
            ->with('success', 'Hakim telah berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\Jaksa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class JaksaController extends Controller
{
    /**
     * Display a listing of the jaksa.
     *
     * @return Response
     */
    public function index()
    {
        $jaksas = Jaksa::all();
        return view('pages.jaksa.index', compact('jaksas'));
    }

    /**
     * Show the form for creating a new jaksa.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.jaksa.create');
    }

    public function validateRules(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan' => 'required',
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
            return base64_encode(File::get(storage_path('app/public/avatar.png')));
        } else {
            $image = Image::make($request->file('foto')->path())->encode('png');
            return base64_encode($image);
        }
    }

    /**
     * Store a newly created jaksa in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateRules($request);

        $defaultFoto = $this->defaultFoto($request);

        Jaksa::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pangkat' => explode(' - ', $request->pangkat_golongan)[0],
            'golongan' => explode(' - ', $request->pangkat_golongan)[1],
            'jabatan' => $request->jabatan,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('jaksa.index')
            ->with('success', "Jaksa telah berhasil ditambah.");
    }

    /**
     * Display the specified jaksa.
     *
     * @param Jaksa $jaksa
     * @return Response
     */
    public function show(Jaksa $jaksa)
    {
        //
    }

    /**
     * Show the form for editing the specified jaksa.
     *
     * @param Jaksa $jaksa
     * @return Response
     */
    public function edit(Jaksa $jaksa)
    {
        $pangkatGolongan = $jaksa->pangkat . ' - ' . $jaksa->golongan;
        return view('pages.jaksa.edit', compact('jaksa', 'pangkatGolongan'));
    }

    /**
     * Update the specified jaksa in storage.
     *
     * @param Request $request
     * @param Jaksa $jaksa
     * @return Response
     */
    public function update(Request $request, Jaksa $jaksa)
    {
        $this->validateRules($request);

        $defaultFoto = $this->defaultFoto($request);

        $jaksa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pangkat' => explode(' - ', $request->pangkat_golongan)[0],
            'golongan' => explode(' - ', $request->pangkat_golongan)[1],
            'jabatan' => $request->jabatan,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'status' => $request->status,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('jaksa.index')
            ->with('success', 'Jaksa telah berhasil diperbarui');
    }

    /**
     * Remove the specified jaksa from storage.
     *
     * @param Jaksa $jaksa
     * @return Response
     */
    public function destroy(Jaksa $jaksa)
    {
        $jaksa->delete();
        return redirect()->route('jaksa.index')
            ->with('success', 'Jaksa telah berhasil dihapus');
    }
}

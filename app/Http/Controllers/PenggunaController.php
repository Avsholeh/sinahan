<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Pengguna;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PenggunaController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the pengguna.
     *
     * @return Response
     */
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('pages.pengguna.index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new pengguna.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.pengguna.create');
    }

    /**
     * Store a newly created pengguna in storage.
     *
     * @param Request $request
     * @return Response
     * @throws FileNotFoundException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'password' => $this->passwordRules(),
            'roles' => 'required',
        ]);

        $newPassword = Hash::make($request->password);

        $defaultFoto = base64_encode(File::get(storage_path('app/public/avatar.png')));

        if (!$request->foto) {
            if ($request->roles === 'TU-PEGAWAI') {
                if ($request->jenis_kelamin === 'Perempuan') {
                    $defaultFoto = base64_encode(File::get(storage_path('app/public/perempuan.png')));
                } else {
                    $defaultFoto = base64_encode(File::get(storage_path('app/public/laki.png')));
                }
            }
        } else {
            $image = Image::make($request->file('foto')->path())->encode('png');
            $defaultFoto = base64_encode($image);
        }

        Pengguna::insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $newPassword,
            'roles' => $request->roles,
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('pengguna.index')
            ->with('success', "Pengguna telah berhasil ditambah.");
    }

    /**
     * Display the specified pengguna.
     *
     * @param Pengguna $pengguna
     * @return Response
     */
    public function show(Pengguna $pengguna)
    {
        // not available
    }

    /**
     * Show the form for editing the specified pengguna.
     *
     * @param Pengguna $pengguna
     * @return Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('pages.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified pengguna in storage.
     *
     * @param Request $request
     * @param Pengguna $pengguna
     * @return Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'password' => $this->passwordRules(),
            'roles' => 'required',
        ]);

        // update password
        $newPassword = $request->password;
        if ($newPassword === 'password') {
            $newPassword = auth()->user()->getAuthPassword();
        } else {
            $newPassword = Hash::make($request->password);
        }

        // update pengguna info
        $updatePengguna = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $newPassword,
            'roles' => $request->roles,
        ];

        // update foto
        if ($request->foto) {
            $image = Image::make($request->foto->path())->encode('png');
            $updatePengguna['foto'] = base64_encode($image);
        }

        $pengguna->update($updatePengguna);

        return redirect()->route('pengguna.index')
            ->with('success', "Pengguna telah berhasil diperbarui.");
    }

    /**
     * Remove the specified pengguna from storage.
     *
     * @param Pengguna $pengguna
     * @return Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna telah berhasil dihapus');
    }
}

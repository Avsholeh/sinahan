<?php

namespace App\Http\Controllers;


use App\Actions\Fortify\PasswordValidationRules;
use App\Models\DataPengunjung;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class BiodataController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        $dataPengunjungs = DataPengunjung::all();
        return view('pages.biodata.index', compact('dataPengunjungs'));
    }

    public function edit()
    {
        return view('pages.biodata.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username'=> 'required',
            'jenis_kelamin'=> 'required',
            'roles'=> 'required',
            'password'=> $this->passwordRules(),
//            'foto'=> 'required',
        ]);

        $newPassword = $request->password;

        if ($newPassword === 'password') {
            $newPassword = auth()->user()->getAuthPassword();
        } else {
            $newPassword = Hash::make($request->password);
        }



        $pengguna = Pengguna::find(auth()->user()->id);
        $pengguna->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username'=> $request->username,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'roles'=> $request->roles,
            'password'=> $newPassword,
        ]);

        if ($request->foto) {
            $image = Image::make($request->file('foto')->path())->encode('png');
            $foto = base64_encode($image);
            $pengguna->update([
                'foto'=> $foto,
            ]);
        }

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil diperbarui.');
    }
}

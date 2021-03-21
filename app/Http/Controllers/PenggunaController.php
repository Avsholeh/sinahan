<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
        $pengguna = Pengguna::all();
        return view('pages.pengguna.index', compact('pengguna'));
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
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'password' => $this->passwordRules(),
            'roles' => 'required',
//            'foto' => 'required',
        ]);

        $newPassword = Hash::make($request->password);

        Pengguna::insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $newPassword,
            'roles' => $request->roles,
            'foto' => $request->foto,
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
//            'foto' => 'required',
        ]);

        $newPassword = $request->password;

        if ($newPassword === 'password') {
            $newPassword = auth()->user()->getAuthPassword();
        } else {
            $newPassword = Hash::make($request->password);
        }

        $pengguna->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $newPassword,
            'roles' => $request->roles,
            'foto' => $request->foto,
        ]);

        return redirect()->route('pengguna.index')
            ->with('success', "Data pengguna {$pengguna->nama_lengkap} telah berhasil diperbarui.");
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
            ->with('success','Pengguna telah berhasil dihapus');
    }
}

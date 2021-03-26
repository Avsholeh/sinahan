<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class HakimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $hakims = Hakim::all();
        return view('pages.hakim.index', compact('hakims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.hakim.create');
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
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pangkat_golongan' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
        ]);

        $hakim = Hakim::create($request->all());

        return redirect()->route('hakim.index')
            ->with('success', "Hakim telah berhasil ditambah.");
    }

    /**
     * Display the specified resource.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function show(Hakim $hakim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function edit(Hakim $hakim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hakim $hakim
     * @return Response
     */
    public function update(Request $request, Hakim $hakim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Hakim $hakim
     * @return Response
     */
    public function destroy(Hakim $hakim)
    {
        //
    }
}

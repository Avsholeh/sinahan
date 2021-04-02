<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\Jaksa;
use App\Models\Narapidana;
use App\Models\Sidang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SidangController extends Controller
{
    /**
     * Display a listing of the sidang.
     *
     * @return Response
     */
    public function index()
    {
        $sidangs = Sidang::all();
        return view('pages.sidang.index', compact('sidangs'));
    }

    /**
     * Show the form for creating a new sidang.
     *
     * @return Response
     */
    public function create()
    {
        $hakims = Hakim::all();
        $jaksas = Jaksa::all();
        $narapidanas = Narapidana::all();
        return view('pages.sidang.create', compact('hakims', 'jaksas', 'narapidanas'));
    }

    public function validateRules(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
//            'hakim_id' => 'required',
//            'jaksa_id' => 'required',
//            'narapidana_id' => 'required',
            'pasal' => 'required',
            // 'jpu' => 'required',
            'keterangan' => 'required',
        ]);
    }

    /**
     * Store a newly created sidang in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateRules($request);

        Sidang::create($request->all());

        return redirect()->route('sidang.index')
            ->with('success', "Sidang telah berhasil ditambah.");
    }

    /**
     * Display the specified sidang.
     *
     * @param Sidang $sidang
     * @return Response
     */
    public function show(Sidang $sidang)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified sidang.
     *
     * @param Sidang $sidang
     * @return Response
     */
    public function edit(Sidang $sidang)
    {
        $hakims = Hakim::all();
        $jaksas = Jaksa::all();
        $narapidanas = Narapidana::all();
        return view('pages.sidang.edit', compact('sidang', 'hakims', 'jaksas', 'narapidanas'));
    }

    /**
     * Update the specified sidang in storage.
     *
     * @param Request $request
     * @param Sidang $sidang
     * @return Response
     */
    public function update(Request $request, Sidang $sidang)
    {
//        dd($request);
        $this->validateRules($request);

        $sidang->update($request->all());

        return redirect()->route('sidang.index')
            ->with('success', 'Sidang telah berhasil diperbarui');
    }

    /**
     * Remove the specified sidang from storage.
     *
     * @param Sidang $sidang
     * @return Response
     */
    public function destroy(Sidang $sidang)
    {
        $sidang->delete();
        return redirect()->route('sidang.index')
            ->with('success', 'Sidang telah berhasil dihapus');
    }
}

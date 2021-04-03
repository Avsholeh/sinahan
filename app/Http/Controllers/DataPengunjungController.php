<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
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
        return view('pages.data_pengunjung.index');
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
        dd($request->all());
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
        return view('pages.data_pengunjung.edit');
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
        //
    }

    /**
     * Remove the specified data pengujung from storage.
     *
     * @param DataPengunjung $dataPengunjung
     * @return Response
     */
    public function destroy(DataPengunjung $dataPengunjung)
    {
        //
    }
}
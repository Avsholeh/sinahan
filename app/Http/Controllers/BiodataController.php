<?php

namespace App\Http\Controllers;


class BiodataController extends Controller
{
    public function index()
    {
        return view('pages.biodata.index');
    }

    public function edit()
    {
        return view('pages.biodata.edit');
    }
}

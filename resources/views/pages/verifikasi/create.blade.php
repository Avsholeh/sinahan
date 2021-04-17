@extends('layouts.app')

@section('title', 'Verifikasi')

@section('desc', 'Form verifikasi kunjungan')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Waktu Kunjungan</label>

                        @if($kunjungan->waktuKunjungan->count() > 0)
                            @foreach($kunjungan->waktuKunjungan as $waktuKunjungan)
                                <div class="alert alert-warning">
                                    <strong>{{ $waktuKunjungan->tanggal }}</strong> {{ $waktuKunjungan->dari_jam }}
                                    - {{ $waktuKunjungan->hingga_jam }}
                                    <button type="button" class="close"
                                            onclick="document.getElementById('waktu-{{ $waktuKunjungan->id }}').submit()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <form id="waktu-{{ $waktuKunjungan->id }}"
                                          action="{{ route('kunjungan.waktu_kunjungan.delete', $waktuKunjungan->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                Anda belum menentukan waktu kunjungan.
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                {{-- FORM WAKTU KUNJUNGAN --}}
                                <form action="{{ route('kunjungan.waktu_kunjungan.store') }}"
                                      method="post">

                                    @csrf
                                    @method('post')

                                    <input name="kunjungan_id" type="text" value="{{ $kunjungan->id }}"
                                           class="d-none">

                                    <div class="form-row">

                                        {{-- TANGGAL --}}
                                        <div class="form-group col-4">
                                            <label for="tanggal">Tanggal</label>
                                            <input name="tanggal" type="date" class="form-control" id="tanggal"
                                                   value="{{ old('tanggal') }}">

                                            @error('tanggal')
                                            <small class="form-text text-danger">
                                                <i class="fa fa-info-circle"></i> {{ $message }}
                                            </small>
                                            @enderror
                                        </div>

                                        {{-- DARI JAM --}}
                                        <div class="form-group col-4">
                                            <label for="dari_jam">Dari Jam</label>
                                            <input name="dari_jam" type="time" class="form-control" id="dari_jam"
                                                   value="{{ old('dari_jam') }}">

                                            @error('dari_jam')
                                            <small class="form-text text-danger">
                                                <i class="fa fa-info-circle"></i> {{ $message }}
                                            </small>
                                            @enderror
                                        </div>

                                        {{-- HINGGA JAM --}}
                                        <div class="form-group col-4">
                                            <label for="hingga_jam">Hingga Jam</label>
                                            <input name="hingga_jam" type="time" class="form-control"
                                                   id="hingga_jam"
                                                   value="{{ old('hingga_jam') }}">

                                            @error('hingga_jam')
                                            <small class="form-text text-danger">
                                                <i class="fa fa-info-circle"></i> {{ $message }}
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <input class="btn btn-primary" type="submit" value="Tambah">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Data Pengunjung
                </div>
                <div class="card-body">

                    @foreach($kunjungan->dataPengunjungKunjungan as $dataPengunjungKunjungan)

                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="card  border-left-info">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Nama Lengkap
                                                </div>
                                                <div class="row no-gutters align-items-center mb-1">
                                                    <div class="col-auto">
                                                        <div class="mb-0 mr-3 text-gray-800">
                                                            {{ $dataPengunjungKunjungan->dataPengunjung->nama_lengkap }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Pekerjaan
                                                </div>
                                                <div class="row no-gutters align-items-center mb-1">
                                                    <div class="col-auto">
                                                        <div class="mb-0 mr-3 text-gray-800">
                                                            {{ $dataPengunjungKunjungan->dataPengunjung->pekerjaan }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Hubungan
                                                </div>
                                                <div class="row no-gutters align-items-center mb-1">
                                                    <div class="col-auto">
                                                        <div class="mb-0 mr-3 text-gray-800">
                                                            {{ $dataPengunjungKunjungan->dataPengunjung->hubungan }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col d-flex align-content-center justify-content-end">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#ktpModal">
                                                    Lihat KTP
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ktpModal"
                                                     role="dialog"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">KTP</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="data:image/png;base64,{{ $dataPengunjungKunjungan->dataPengunjung->ktp }}"
                                                                     width="400">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                    Tutup
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-lg-6 col-xl-6">
            <div class="card mb-4">
                <div class="card-body">

                    @if(session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif

                    <form action="{{ route('kunjungan.verifikasi.store') }}" method="post">
                        @csrf
                        @method('post')

                        {{-- Kunjungan ID --}}
                        <div class="form-group">
                            <label for="kunjungan_id">ID Kunjungan</label>
                            <input name="kunjungan_id" type="text" class="form-control"
                                   value="{{ $kunjungan->id }}" id="kunjungan_id"
                                   readonly>

                            @error('kunjungan_id')
                            <small class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Diajukan oleh --}}
                        <div class="form-group">
                            <label for="pengguna">Pengguna</label>
                            <input name="pengguna" type="text" class="form-control"
                                   value="{{ $kunjungan->pengguna->nama_lengkap }}" id="pengguna"
                                   readonly>

                            @error('pengguna')
                            <small class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Narapidana --}}
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <input name="narapidana" type="text" class="form-control"
                                   value="{{ $kunjungan->narapidana->nama_lengkap }}" id="narapidana"
                                   readonly>

                            @error('narapidana')
                            <small class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Keperluan --}}
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input name="keperluan" type="text" class="form-control"
                                   value="{{ $kunjungan->keperluan }}" id="keperluan"
                                   readonly>

                            @error('keperluan')
                            <small class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Nomor Surat --}}
                        <div class="form-group">
                            <label for="no_surat">No Surat <small style="color: red"> * mohon diisi sebelum melakukan verifikasi</small></label>
                            <input name="no_surat" type="text" class="form-control" id="no_surat">

                            @error('no_surat')
                            <small class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Verifikasi"/>
                            <a href="{{ route('kunjungan.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

        </div>
    </div>

@endsection
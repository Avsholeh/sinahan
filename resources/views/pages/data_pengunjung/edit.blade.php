@extends('layouts.app')

@section('title', 'Perbarui Data Pengunjung')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('dataPengunjung.update', $dataPengunjung->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        {{-- PENGGUNA ID (HIDDEN) --}}
                        <div class="form-group d-none">
                            <label for="nama_lengkap"></label>
                            <input id="pengguna_id" name="pengguna_id" type="text"
                                   value="{{ auth()->user()->id }}">
                        </div>

                        {{-- NAMA LENGKAP --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="{{ $dataPengunjung->nama_lengkap }}"
                                   aria-describedby="nama_lengkap_help">

                            @error('nama_lengkap')
                            <small id="nama_lengkap_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TEMPAT LAHIR --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                   value="{{ $dataPengunjung->tempat_lahir }}"
                                   aria-describedby="tempat_lahir_help">

                            @error('tempat_lahir')
                            <small id="tempat_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                   value="{{ $dataPengunjung->tanggal_lahir }}"
                                   aria-describedby="tanggal_lahir_help">

                            @error('tanggal_lahir')
                            <small id="tanggal_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- ALAMAT --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" type="text" class="form-control" id="alamat"
                                      aria-describedby="alamat_help">{{ $dataPengunjung->alamat }}</textarea>

                            @error('alamat')
                            <small id="alamat_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PEKERJAAN --}}
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                   value="{{ $dataPengunjung->pekerjaan }}"
                                   aria-describedby="pekerjaan_help">

                            @error('pekerjaan')
                            <small id="pekerjaan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- HUBUNGAN --}}
                        <div class="form-group">
                            <label for="hubungan">Hubungan</label>
                            <input name="hubungan" type="text" class="form-control" id="hubungan"
                                   value="{{ $dataPengunjung->hubungan }}"
                                   aria-describedby="hubungan_help">

                            @error('hubungan')
                            <small id="hubungan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KTP --}}
                        <div class="form-group">
                            <label for="ktp">KTP</label>
                            <input name="ktp" type="file" class="form-control-file" id="ktp"
                                   value="@if(old('ktp')){{ old('ktp') }}@endif"
                                   aria-describedby="ktp_help">

                            @error('ktp')
                            <small id="ktp_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('biodata.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection

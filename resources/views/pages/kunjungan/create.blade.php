@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('desc', 'Anda dapat menambahkan Kunjungan dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <!-- KUNJUNGAN -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('kunjungan.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        <input name="pengguna_id" class="d-none" type="text" value="{{ auth()->user()->id }}">

                        {{-- DATA PENGUNJUNG --}}
                        <div class="form-group">
                            <label for="data_pengunjung">Data Pengunjung</label>

                            @if(count($dataPengunjungs))

                                <select multiple name="data_pengunjung[]" id="data_pengunjung"
                                        class="form-control chosen-select">
                                    @foreach($dataPengunjungs as $dataPengunjung)
                                        <option
                                            value="{{ $dataPengunjung->id }}" @if(old('data_pengunjung') === 'Aktif'){{ 'selected' }}@endif>
                                            ID:{{ $dataPengunjung->id }} - {{ $dataPengunjung->nama_lengkap }}
                                        </option>k
                                    @endforeach
                                </select>

                            @else

                                <div class="alert alert-danger">
                                    Anda tidak memiliki data pengunjung. Silahkan tambah data pengunjung melalui tombol
                                    dibawah ini!
                                </div>

                            @endif

                            @error('data_pengunjung')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror

                            <a class="btn btn-primary btn-icon-split btn-sm mt-3" data-toggle="modal"
                               data-target="#tambahDataPengunjungModal" data-backdrop="static"
                               data-keyboard="false">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                <span class="text">Tambah Data Pengunjung</span>
                            </a>
                        </div>

                        {{-- NARAPIDANA --}}
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <select name="narapidana_id" id="narapidana" class="form-control chosen-select">
                                <option value="" disabled selected>Pilih narapidana</option>
                                @foreach($narapidanas as $narapidana)
                                    <option value="{{ $narapidana->id }}">{{ $narapidana->nama_lengkap }}
                                        ({{ $narapidana->jenis_kelamin }}) ({{ $narapidana->status }})
                                    </option>
                                @endforeach
                            </select>

                            @error('narapidana_id')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KEPERLUAN --}}
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="3"
                                      aria-describedby="keperluan"></textarea>

                            @error('keperluan')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kunjungan.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
            <!-- END KUNJUNGAN -->
        </div>
    </div>

    <!-- TAMBAH DATA PENGUNJUNG-->
    <div class="modal fade" id="tambahDataPengunjungModal" tabindex="-1" role="dialog"
         aria-labelledby="tambahDataPengunjungModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataPengunjungModalLabel">Tambah Biodata Kunjungan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- FORM TAMBAH DATA KUNJUNGAN --}}
                    <form action="{{ route('dataPengunjung.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

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
                                   value="@if(old('nama_lengkap')) {{ old('nama_lengkap') }}@endif"
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
                                   value="@if(old('tempat_lahir')) {{ old('tempat_lahir') }}@endif"
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
                                   value="@if(old('tanggal_lahir')) {{ old('tanggal_lahir') }}@endif"
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
                                      aria-describedby="alamat_help">
                                @if(old('alamat')) {{ old('alamat') }}@endif
                            </textarea>

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
                                   value="@if(old('pekerjaan')) {{ old('pekerjaan') }}@endif"
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
                                   value="@if(old('hubungan')) {{ old('hubungan') }}@endif"
                                   aria-describedby="hubungan_help">

                            @error('hubungan')
                            <small id="hubungan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $(".chosen-select").chosen({
                allow_single_deselect: true,
                no_results_text: "Tidak ditemukan"
            })
        });
    </script>

@endsection

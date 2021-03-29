@extends('layouts.app')

@section('title', 'Tambah Jaksa')

@section('desc', 'Anda dapat menambahkan Jaksa dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('jaksa.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        {{-- NAMA LENGKAP --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="@if(old('nama_lengkap')) {{ old('nama_lengkap') }}@endif"
                                   aria-describedby="username_help">

                            @error('nama_lengkap')
                            <small id="nama_lengkap_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- NIP --}}
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input name="nip" type="number" class="form-control" id="nip"
                                   value="@if(old('nip')){{ old('nip') }}@endif"
                                   aria-describedby="nip_help">

                            @error('nip')
                            <small id="nip_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TEMPAT LAHIR --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                   value="@if(old('tempat_lahir')){{ old('tempat_lahir') }}@endif"
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
                                   value="@if(old('tanggal_lahir')){{ old('tanggal_lahir') }}@endif">

                            @error('tanggal_lahir')
                            <small id="tanggal_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PANGKAT / GOLONGAN --}}
                        <div class="form-group">
                            <label for="pangkat_golongan">Pangkat/Golongan</label>
                            <select name="pangkat_golongan" id="pangkat_golongan" class="form-control">
                                <option disabled selected>Pilih pangkat/golongan</option>
                                <option value="I A - Juru Muda">I A - Juru Muda</option>
                                <option value="I B - Juru Muda Tingkat 1">I B - Juru Muda Tingkat 1</option>
                                <option value="I C - Juru">I C - Juru</option>
                                <option value="I D - Juru Tingkat 1">I D - Juru Tingkat 1</option>
                                <option value="II A - Pengatur Muda">II A - Pengatur Muda</option>
                                <option value="II B - Pengatur Muda Tingkat 1">II B - Pengatur Muda Tingkat 1</option>
                                <option value="II C - Pengatur">II C - Pengatur</option>
                                <option value="II D - Pengatur Tingkat 1">II D - Pengatur Tingkat 1</option>
                                <option value="III A - Penata Muda">III A - Penata Muda</option>
                                <option value="III B - Penata Muda Tingkat 1">III B - Penata Muda Tingkat 1</option>
                                <option value="III C - Penata">III C - Penata</option>
                                <option value="III D - Penata Tingkat 1">III D - Penata Tingkat 1</option>
                                <option value="IV A - Pembina">IV A - Pembina</option>
                                <option value="IV B - Pembina Tingkat 1">IV B - Pembina Tingkat 1</option>
                                <option value="IV C - Pembina Utama Muda">IV C - Pembina Utama Muda</option>
                                <option value="IV D - Pembina Utama Madya">IV D - Pembina Utama Madya</option>
                                <option value="IV E - Pembina Utama">IV E - Pembina Utama</option>
                            </select>

                            @error('pangkat_golongan')
                            <small id="pangkat_golongan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- JABATAN --}}
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input name="jabatan" type="text" class="form-control" id="jabatan"
                                   value="@if(old('jabatan')) {{ old('jabatan') }}@endif"
                                   aria-describedby="jabatan_help">

                            @error('jabatan')
                            <small id="jabatan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- AGAMA --}}
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control" aria-describedby="agama_help">
                                <option value="" readonly>Pilih agama</option>
                                <option value="Islam" @if(old('agama') === 'Islam'){{ 'selected' }}@endif>
                                    Islam
                                </option>
                                <option value="Kristen" @if(old('agama') === 'Kristen'){{ 'selected' }}@endif>
                                    Kristen
                                </option>
                                <option value="Budha" @if(old('agama') === 'Budha'){{ 'selected' }}@endif>
                                    Budha
                                </option>
                                <option value="Hindu" @if(old('agama') === 'Hindu'){{ 'selected' }}@endif>
                                    Hindu
                                </option>
                                <option value="Konghucu" @if(old('agama') === 'Konghucu'){{ 'selected' }}@endif>
                                    Konghucu
                                </option>
                            </select>

                            @error('agama')
                            <small id="agama_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="" readonly>Pilih jenis kelamin</option>
                                <option
                                    value="Pria" @if(old('jenis_kelamin') === 'Pria') {{ 'selected' }} @endif>
                                    Pria
                                </option>
                                <option
                                    value="Wanita" @if(old('jenis_kelamin') === 'Wanita') {{ 'selected' }} @endif>
                                    Wanita
                                </option>
                            </select>

                            @error('jenis_kelamin')
                            <small id="jenis_kelamin_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PENDIDIKAN --}}
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir</label>
                            <input name="pendidikan" type="text" class="form-control" id="pendidikan"
                                   value="@if(old('pendidikan')) {{ old('pendidikan') }}@endif">

                            @error('pendidikan')
                            <small id="pendidikan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" readonly>Pilih status</option>
                                <option value="Aktif" @if(old('status') === 'Aktif'){{ 'selected' }}@endif>Aktif
                                </option>
                                <option value="Tidak Aktif" @if(old('status') === 'Tidak Aktif'){{ 'selected' }}@endif>
                                    Tidak Aktif
                                </option>
                            </select>

                            @error('status')
                            <small id="status_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- FOTO --}}
                        <div class="form-group">
                            <label for="foto">Upload foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto"
                                   value="@if(old('foto')) {{ old('foto') }}@endif">

                            @error('foto')
                            <small id="foto_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hakim.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

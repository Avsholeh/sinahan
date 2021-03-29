@extends('layouts.app')

@section('title', 'Perbarui Hakim')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('hakim.update', $hakim->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        {{-- Nama Lengkap --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="{{ $hakim->nama_lengkap }}"
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
                                   value="{{ $hakim->nip }}"
                                   aria-describedby="nip_help">

                            @error('nip')
                            <small id="nip_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                   value="{{ $hakim->tempat_lahir }}"
                                   aria-describedby="tempat_lahir_help">

                            @error('tempat_lahir')
                            <small id="tempat_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                   value="{{ $hakim->tanggal_lahir }}"
                                   aria-describedby="tanggal_lahir_help">

                            @error('tanggal_lahir')
                            <small id="tanggal_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Pangkat/golongan --}}
                        <div class="form-group">
                            <label for="pangkat_golongan">Pangkat/Golongan</label>
                            <select name="pangkat_golongan" id="pangkat_golongan" class="form-control"
                                    aria-describedby="pangkat_golongan_lahir_help">
                                <option value="" readonly="">Pilih pangkat/golongan</option>
                                <option
                                    @if($pangkatGolongan === 'I A - Juru Muda'){{ 'selected' }}@endif
                                    value="I A - Juru Muda">I A - Juru Muda</option>
                                <option
                                    @if($pangkatGolongan === 'I B - Juru Muda Tingkat 1'){{ 'selected' }}@endif
                                    value="I B - Juru Muda Tingkat 1">I B - Juru Muda Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'I C - Juru'){{ 'selected' }}@endif
                                    value="I C - Juru">I C - Juru</option>
                                <option
                                    @if($pangkatGolongan === 'I D - Juru Tingkat 1'){{ 'selected' }}@endif
                                    value="I D - Juru Tingkat 1">I D - Juru Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'II A - Pengatur Muda'){{ 'selected' }}@endif
                                    value="II A - Pengatur Muda">II A - Pengatur Muda</option>
                                <option
                                    @if($pangkatGolongan === 'II B - Pengatur Muda Tingkat 1'){{ 'selected' }}@endif
                                    value="II B - Pengatur Muda Tingkat 1">II B - Pengatur Muda Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'II C - Pengatur'){{ 'selected' }}@endif
                                    value="II C - Pengatur">II C - Pengatur</option>
                                <option
                                    @if($pangkatGolongan === 'II D - Pengatur Tingkat 1'){{ 'selected' }}@endif
                                    value="II D - Pengatur Tingkat 1">II D - Pengatur Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'III A - Penata Muda'){{ 'selected' }}@endif
                                    value="III A - Penata Muda">III A - Penata Muda</option>
                                <option
                                    @if($pangkatGolongan === 'III B - Penata Muda Tingkat 1'){{ 'selected' }}@endif
                                    value="III B - Penata Muda Tingkat 1">III B - Penata Muda Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'III C - Penata'){{ 'selected' }}@endif
                                    value="III C - Penata">III C - Penata</option>
                                <option
                                    @if($pangkatGolongan === 'III D - Penata Tingkat 1'){{ 'selected' }}@endif
                                    value="III D - Penata Tingkat 1">III D - Penata Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'IV A - Pembina'){{ 'selected' }}@endif
                                    value="IV A - Pembina">IV A - Pembina</option>
                                <option
                                    @if($pangkatGolongan === 'IV B - Pembina Tingkat 1'){{ 'selected' }}@endif
                                    value="IV B - Pembina Tingkat 1">IV B - Pembina Tingkat 1</option>
                                <option
                                    @if($pangkatGolongan === 'IV C - Pembina Utama Muda'){{ 'selected' }}@endif
                                    value="IV C - Pembina Utama Muda">IV C - Pembina Utama Muda</option>
                                <option
                                    @if($pangkatGolongan === 'IV D - Pembina Utama Madya'){{ 'selected' }}@endif
                                    value="IV D - Pembina Utama Madya">IV D - Pembina Utama Madya</option>
                                <option
                                    @if($pangkatGolongan === 'IV E - Pembina Utama'){{ 'selected' }}@endif
                                    value="IV E - Pembina Utama">IV E - Pembina Utama</option>
                            </select>

                            @error('pangkat_golongan')
                            <small id="pangkat_golongan_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Agama --}}
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control" aria-describedby="agama_help">
                                <option value="" readonly>Pilih agama</option>
                                <option value="Islam"@if($hakim->agama === 'Islam'){{ ' selected' }}@endif>
                                    Islam
                                </option>
                                <option value="Kristen"@if($hakim->agama === 'Kristen'){{ ' selected' }}@endif>
                                    Kristen
                                </option>
                                <option value="Budha"@if($hakim->agama === 'Budha'){{ ' selected' }}@endif>
                                    Budha
                                </option>
                                <option value="Hindu"@if($hakim->agama === 'Hindu'){{ ' selected' }}@endif>
                                    Hindu
                                </option>
                                <option value="Konghucu"@if($hakim->agama === 'Konghucu'){{ ' selected' }}@endif>
                                    Konghucu
                                </option>
                            </select>

                            @error('agama')
                            <small id="agama_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                    aria-describedby="jenis_kelamin_help">
                                <option value="" readonly="">Pilih jenis kelamin</option>
                                <option
                                    @if($hakim->jenis_kelamin === 'Pria'){{ 'selected' }}@endif
                                    value="Pria"
                                >Pria
                                </option>

                                <option
                                    @if($hakim->jenis_kelamin === 'Wanita'){{ 'selected' }}@endif
                                    value="Wanita"
                                >Wanita
                                </option>
                            </select>

                            @error('jenis_kelamin')
                            <small id="jenis_kelamin_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Pendidikan --}}
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input name="pendidikan" type="text" class="form-control" id="pendidikan"
                                   value="{{ $hakim->pendidikan }}">

                            @error('pendidikan')
                            <small id="nama_lengkap_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" readonly>Pilih status</option>
                                <option value="Aktif" @if($hakim->status === 'Aktif'){{ 'selected' }}@endif>Aktif
                                </option>
                                <option value="Tidak Aktif" @if($hakim->status === 'Tidak Aktif'){{ 'selected' }}@endif>
                                    Tidak Aktif
                                </option>
                            </select>

                            @error('status')
                            <small id="status_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Foto --}}
                        <div class="form-group">
                            <label for="foto">Upload foto</label>
                            <img class="mb-2" style="display: block" src="data:image/png;base64,{{ $hakim->foto }}"
                                 alt="foto"
                                 width="200">
                            <input name="foto" type="file" class="form-control-file" id="foto"
                                   value="{{ $hakim->foto }}">

                            @error('foto')
                            <small id="nama_lengkap_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

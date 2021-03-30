@extends('layouts.app')

@section('title', 'Perbarui Narapidana')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('narapidana.update', $narapidana->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        {{-- NAMA LENGKAP --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="{{ $narapidana->nama_lengkap }}"
                                   aria-describedby="username_help">

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
                                   aria-describedby="tanggal_lahir_help">

                            @error('tanggal_lahir')
                            <small id="tanggal_lahir_help" class="form-text text-danger">
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

                        {{-- KEBANGSAAN --}}
                        <div class="form-group">
                            <label for="kebangsaan">Kebangsaan</label>
                            <input name="kebangsaan" type="text" class="form-control" id="kebangsaan"
                                   aria-describedby="kebangsaan_help">

                            @error('kebangsaan')
                            <small id="kebangsaan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TEMPAT TINGGAL --}}
                        <div class="form-group">
                            <label for="tempat_tinggal">Alamat/Tempat Tinggal</label>
                            <input name="tempat_tinggal" type="text" class="form-control" id="tempat_tinggal"
                                   aria-describedby="tempat_tinggal_help">

                            @error('tempat_tinggal')
                            <small id="tempat_tinggal_help" class="form-text text-danger">
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

                        {{-- PEKERJAAN --}}
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                   aria-describedby="pekerjaan_help">

                            @error('pekerjaan')
                            <small id="pekerjaan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PENDIDIKAN --}}
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input name="pendidikan" type="text" class="form-control" id="pendidikan"
                                   aria-describedby="pendidikan_help">

                            @error('pendidikan')
                            <small id="pendidikan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- REG PERKARA --}}
                        <div class="form-group">
                            <label for="reg_perkara">Reg Perkara</label>
                            <input name="reg_perkara" type="text" class="form-control" id="reg_perkara"
                                   aria-describedby="reg_perkara_help">

                            @error('reg_perkara')
                            <small id="reg_perkara_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- REG TAHANAN --}}
                        <div class="form-group">
                            <label for="reg_tahanan">Reg Tahanan</label>
                            <input name="reg_tahanan" type="text" class="form-control" id="reg_tahanan"
                                   aria-describedby="reg_tahanan_help">

                            @error('reg_tahanan')
                            <small id="reg_tahanan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- REG BUKTI --}}
                        <div class="form-group">
                            <label for="reg_bukti">Reg Bukti</label>
                            <input name="reg_bukti" type="text" class="form-control" id="reg_bukti"
                                   aria-describedby="reg_bukti_help">

                            @error('reg_bukti')
                            <small id="reg_bukti_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" id="keterangan" class="form-control"
                                    aria-describedby="keterangan_help">
                                <option value="" readonly>Pilih keterangan</option>
                                <option value="Keterangan Saksi" @if(old('keterangan') === 'Keterangan Saksi'){{ 'selected' }}@endif>
                                    Keterangan Saksi
                                </option>
                                <option
                                    value="Putusan" @if(old('keterangan') === 'Putusan'){{ 'selected' }}@endif>
                                    Putusan
                                </option>
                                <option
                                    value="Dakwaan" @if(old('keterangan') === 'Dakwaan'){{ 'selected' }}@endif>
                                    Dakwaan
                                </option>
                                <option
                                    value="Tuntuan" @if(old('keterangan') === 'Tuntuan'){{ 'selected' }}@endif>
                                    Tuntuan
                                </option>
                                <option
                                    value="Bukan Tahanan Jaksa" @if(old('keterangan') === 'Bukan Tahanan Jaksa'){{ 'selected' }}@endif>
                                    Bukan Tahanan Jaksa
                                </option>
                            </select>

                            @error('keterangan')
                            <small id="keterangan_help" class="form-text text-danger">
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

                        {{-- UPLOAD FOTO --}}
                        <div class="form-group">
                            <label for="foto">Upload foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto"
                                   aria-describedby="foto_help">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>                    </form>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

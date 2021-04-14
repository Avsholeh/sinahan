@extends('layouts.app')

@section('title', 'Perbarui Narapidana')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('narapidana.update', $narapidana->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')

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
                                   value="{{ $narapidana->tempat_lahir }}"
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
                                   value="{{ $narapidana->tanggal_lahir }}"
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
                                        value="Pria" @if($narapidana->jenis_kelamin === 'Pria') {{ 'selected' }} @endif>
                                    Pria
                                </option>
                                <option
                                        value="Wanita" @if($narapidana->jenis_kelamin === 'Wanita') {{ 'selected' }} @endif>
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
                                   value="{{ $narapidana->kebangsaan }}"
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
                                   value="{{ $narapidana->tempat_tinggal }}"
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
                                <option value="Islam" @if($narapidana->agama === 'Islam'){{ 'selected' }}@endif>
                                    Islam
                                </option>
                                <option value="Kristen" @if($narapidana->agama === 'Kristen'){{ 'selected' }}@endif>
                                    Kristen
                                </option>
                                <option value="Budha" @if($narapidana->agama === 'Budha'){{ 'selected' }}@endif>
                                    Budha
                                </option>
                                <option value="Hindu" @if($narapidana->agama === 'Hindu'){{ 'selected' }}@endif>
                                    Hindu
                                </option>
                                <option value="Konghucu" @if($narapidana->agama === 'Konghucu'){{ 'selected' }}@endif>
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
                                   value="{{ $narapidana->pekerjaan }}"
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
                                   value="{{ $narapidana->pendidikan }}"
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
                                   value="{{ $narapidana->reg_perkara }}"
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
                                   value="{{ $narapidana->reg_tahanan }}"
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
                                   value="{{ $narapidana->reg_bukti }}"
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
                                <option
                                        value="{{ \App\Models\Narapidana::KET_SAKSI }}"
                                @if($narapidana->keterangan === \App\Models\Narapidana::KET_SAKSI){{ 'selected' }}@endif>
                                    {{\App\Models\Narapidana::KET_SAKSI}}
                                </option>
                                <option
                                        value="{{ \App\Models\Narapidana::KET_PUTUSAN }}"
                                @if($narapidana->keterangan === \App\Models\Narapidana::KET_PUTUSAN){{ 'selected' }}@endif>
                                    {{ \App\Models\Narapidana::KET_PUTUSAN}}
                                </option>
                                <option
                                        value="{{ \App\Models\Narapidana::KET_DAKWAAN }}"
                                @if($narapidana->keterangan === \App\Models\Narapidana::KET_DAKWAAN){{ 'selected' }}@endif>
                                    {{\App\Models\Narapidana::KET_DAKWAAN}}
                                </option>
                                <option
                                        value="{{ \App\Models\Narapidana::KET_TUNTUTAN }}"
                                @if($narapidana->keterangan === \App\Models\Narapidana::KET_TUNTUTAN){{ 'selected' }}@endif>
                                    {{\App\Models\Narapidana::KET_TUNTUTAN}}
                                </option>
                                <option
                                        value="{{ \App\Models\Narapidana::KET_BUKAN_TAHANAN_JAKSA }}"
                                @if($narapidana->keterangan === \App\Models\Narapidana::KET_BUKAN_TAHANAN_JAKSA){{ 'selected' }}@endif>
                                    {{\App\Models\Narapidana::KET_BUKAN_TAHANAN_JAKSA}}
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
                                <option value="{{ \App\Models\Narapidana::AKTIF }}" @if($narapidana->status === \App\Models\Narapidana::AKTIF){{ 'selected' }}@endif>
                                    Aktif
                                </option>
                                <option value="{{ \App\Models\Narapidana::TIDAK_AKTIF }}" @if($narapidana->status === \App\Models\Narapidana::TIDAK_AKTIF){{ 'selected' }}@endif>
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

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    </form>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

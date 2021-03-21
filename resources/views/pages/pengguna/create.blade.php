@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('desc', 'Anda dapat menambahkan pengguna baru dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('pengguna.store') }}" method="post">

                        @csrf
                        @method('post')

                        {{-- Nama Lengkap --}}
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

                        {{-- Username --}}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username"
                                   value="@if(old('username')) {{ old('username') }}@endif"
                                   aria-describedby="username_help">

                            @error('username')
                            <small id="username_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group">
                            <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin"
                                    id="jenis_kelamin">
                                <option value="" readonly>Pilih jenis kelamin</option>
                                <option
                                    @if(old('jenis_kelamin') === 'laki-laki') {{ 'selected' }}@endif
                                    value="laki-laki"
                                >Laki-laki</option>
                                <option
                                    @if(old('jenis_kelamin') === 'perempuan') {{ 'selected' }}@endif
                                    value="perempuan"
                                >Perempuan</option>
                            </select>
                        </div>

                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="roles">Sebagai</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="" readonly>Pilih jenis pengguna</option>
                                <option
                                    @if(old('roles') === 'TU-PEGAWAI') {{ 'selected' }}@endif
                                    value="TU-PEGAWAI">TU-PEGAWAI</option>
                                <option
                                    @if(old('roles') === 'MASYARAKAT') {{ 'selected' }}@endif
                                    value="MASYARAKAT">MASYARAKAT</option>
                            </select>
                        </div>

                        {{-- Foto --}}
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto"
                                   value="@if(old('foto')) {{ old('foto') }}@endif"
                                   aria-describedby="foto_help">

                            @error('foto')
                            <small id="foto_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password"
                                   value="@if(old('password')) {{ old('password') }}@endif"
                                   aria-describedby="password_help">

                            @error('password')
                            <small id="password_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                   id="password_confirmation">

                            @error('password_confirmation')
                            <small id="password_confirmation_help" class="form-text text-danger">
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

@extends('layouts.app')

@section('title', 'Perbarui Pengguna')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">

                    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        {{-- Nama Lengkap --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="{{ $pengguna->nama_lengkap }}"
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
                                   value="{{ $pengguna->username }}"
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
                                <option disabled>Pilih jenis kelamin</option>
                                <option
                                    @if(auth()->user()->jenis_kelamin === 'Pria'){{ 'selected' }}@endif
                                    value="Pria"
                                >Pria
                                </option>
                                <option
                                    @if(auth()->user()->jenis_kelamin === 'Wanita'){{ 'selected' }}@endif
                                    value="Wanita"
                                >Wanita
                                </option>
                            </select>
                        </div>

                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="roles">Sebagai</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="" disabled>Pilih jenis pengguna</option>

                                @if($pengguna->roles === 'TU-PEGAWAI')

                                    <option selected value="TU-PEGAWAI">TU-PEGAWAI</option>
                                    <option value="MASYARAKAT">MASYARAKAT</option>

                                @else

                                    <option value="TU-PEGAWAI">TU-PEGAWAI</option>
                                    <option selected value="MASYARAKAT">MASYARAKAT</option>

                                @endif
                            </select>
                        </div>

                        {{-- Foto --}}
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto"
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
                                   value="password"
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
                                   value="password"
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

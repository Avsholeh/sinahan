@extends('layouts.app')

@section('title', 'Biodata')

@section('desc', 'Anda dapat memperbarui biodata dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('biodata.store') }}" method="post">

                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                   value="{{ auth()->user()->nama_lengkap }}" aria-describedby="nama_lengkap_help">
                            @error('nama_lengkap')
                            <small id="nama_lengkap_help" class="form-text text-danger">
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

                        {{-- Username --}}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username"
                                   value="{{ auth()->user()->username }}" readonly>
                            @error('username')
                            <small id="username_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   value="password" aria-describedby="password_help">
                            @error('password')
                            <small id="username_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password"
                                   value="password" aria-describedby="password_confirmation_help">
                            @error('password_confirmation')
                            <small id="password_confirmation_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <input type="text" name="roles" value="{{ auth()->user()->roles }}" hidden>

                        {{-- Foto --}}
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control-file" id="foto"
                                   value="{{ auth()->user()->foto }}" aria-describedby="foto_help">
                            @error('foto')
                            <small id="foto_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Biodata')

@section('desc', 'Anda dapat memperbarui biodata dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
{{--                    <div class="alert alert-warning" role="alert">--}}
{{--                        <i class="fa fa-info-circle"></i> Dihimbau untuk mengisi biodata sesuai dengan identitas asli Anda.--}}
{{--                    </div>--}}
                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap"
                                value="{{ auth()->user()->nama_lengkap }}">
{{--                            <small id="username_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Isikan nama sesuai dengan KTP Anda.--}}
{{--                            </small>--}}
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group">
                            <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin"
                                    id="jenis_kelamin">
                                <option disabled>Pilih jenis kelamin</option>

                                @if(auth()->user()->jenis_kelamin === 'laki-laki')

                                <option selected value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>

                                @else

                                <option value="laki-laki">Laki-laki</option>
                                <option selected value="perempuan">Perempuan</option>

                                @endif

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username"
                                   value="{{ auth()->user()->username }}" disabled>
{{--                            <small id="username_help" class="form-text text-danger">--}}
{{--                                <i class="fa fa-info-circle"></i> Username tidak dapat diubah.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password"
                                   value="password" aria-describedby="password_help">
{{--                            <small id="username_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Anda dapat memilih username unik minimal 6 karakter.--}}
{{--                            </small>--}}
                        </div>


                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" aria-describedby="foto_help">
{{--                            <small id="foto_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Foto yang diunggah akan digunakan sebagai foto profil Anda.--}}
{{--                            </small>--}}
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

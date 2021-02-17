@extends('layouts.app')

@section('title', 'Biodata')

@section('desc', 'Anda dapat memperbarui biodata dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-info-circle"></i> Dihimbau untuk mengisi biodata sesuai dengan identitas asli Anda.
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap">
{{--                            <small id="username_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Isikan nama sesuai dengan KTP Anda.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username_help">
{{--                            <small id="username_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Anda dapat memilih username unik minimal 6 karakter.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir">
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" aria-describedby="foto_help">
{{--                            <small id="foto_help" class="form-text text-success">--}}
{{--                                <i class="fa fa-info-circle"></i> Foto yang diunggah akan digunakan sebagai foto profil Anda.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('desc', 'Anda dapat menambahkan pengguna baru dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">

{{--                    <div class="alert alert-danger" role="alert">--}}
{{--                        <i class="fa fa-info-circle"></i> Dihimbau untuk mengisi biodata sesuai dengan identitas asli Anda.--}}
{{--                    </div>--}}

                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap">
{{--                            <small id="username_help" class="form-text text-danger">--}}
{{--                                <i class="fa fa-info-circle"></i> Isikan nama sesuai dengan KTP Anda.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username" aria-describedby="username_help">
{{--                            <small id="username_help" class="form-text text-danger">--}}
{{--                                <i class="fa fa-info-circle"></i> Anda dapat memilih username unik minimal 6 karakter.--}}
{{--                            </small>--}}
                        </div>

                        <div class="form-group">
                            <label for="roles">Sebagai</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="0" disabled selected>Pilih jenis pengguna</option>
                                <option value="0">ADMIN</option>
                                <option value="0">STAFF</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirmation">Konfirmasi Password</label>
                            <input name="password-confirmation" type="password" class="form-control" id="password-confirmation">
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto" aria-describedby="foto_help">
{{--                            <small id="foto_help" class="form-text text-danger">--}}
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

@section('scripts')

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

@endsection

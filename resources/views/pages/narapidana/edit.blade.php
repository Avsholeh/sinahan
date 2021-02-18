@extends('layouts.app')

@section('title', 'Perbarui Narapidana')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" aria-describedby="username_help">
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir"
                                   aria-describedby="tempat_lahir_help">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option disabled selected>Pilih jenis kelamin</option>
                                <option value="0">Laki-Laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kebangsaan">Kebangsaan</label>
                            <input name="kebangsaan" type="text" class="form-control" id="kebangsaan">
                        </div>

                        <div class="form-group">
                            <label for="tempat_tinggal">Alamat/Tempat Tinggal</label>
                            <input name="tempat_tinggal" type="text" class="form-control" id="tempat_tinggal">
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option disabled selected>Pilih agama</option>
                                <option value="0">Islam</option>
                                <option value="0">Kristen</option>
                                <option value="0">Budha</option>
                                <option value="0">Hindu</option>
                                <option value="0">Konghucu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input name="pekerjaan" type="text" class="form-control" id="pekerjaan">
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input name="pendidikan" type="text" class="form-control" id="pendidikan">
                        </div>

                        <div class="form-group">
                            <label for="foto">Upload foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto">
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

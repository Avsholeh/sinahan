@extends('layouts.app')

@section('title', 'Tambah Hakim')

@section('desc', 'Anda dapat menambahkan Hakim dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" aria-describedby="username_help">
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input name="nip" type="date" class="form-control" id="nip" aria-describedby="nip_help">
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
                            <label for="pangkat_golongan">Pangkat/Golongan</label>
                            <select name="pangkat_golongan" id="pangkat_golongan" class="form-control">
                                <option disabled selected>Pilih pangkat</option>
                                <option value="0">I A Juru Muda</option>
                                <option value="0">I B Juru Muda Tingkat 1</option>
                                <option value="0">I C Juru</option>
                                <option value="0">I D Juru Tingkat 1</option>
                                <option value="0">II A Pengatur Muda</option>
                                <option value="0">II B Pengatur Muda Tingkat 1</option>
                                <option value="0">II C Pengatur</option>
                                <option value="0">II D Pengatur Tingkat 1</option>
                                <option value="0">III A Penata Muda</option>
                                <option value="0">III B Penata Muda Tingkat 1</option>
                                <option value="0">III C Penata</option>
                                <option value="0">III D Penata Tingkat 1</option>
                                <option value="0">IV A Pembina</option>
                                <option value="0">IV B Pembina Tingkat 1</option>
                                <option value="0">IV C Pembina Utama Muda</option>
                                <option value="0">IV D Pembina Utama Madya</option>
                                <option value="0">IV E Pembina Utama</option>
                            </select>
                        </div>

                        <div class="form-group d-none">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option disabled>Pilih jabatan</option>
                                <option value="Hakim" selected>Hakim</option>
                                <option value="Jaksa">Jaksa</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
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
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option disabled selected>Pilih jenis kelamin</option>
                                <option value="0">Laki-Laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input name="pendidikan" type="text" class="form-control" id="pendidikan">
                        </div>

                        <div class="form-group">
                            <label for="foto">Upload foto</label>
                            <input name="foto" type="file" class="form-control-file" id="foto">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hakim.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-5">
                <div class="col">
                    <button class="btn btn-primary">Tambah Baru</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="rounded-circle"
                                 style="width: 50px; height: 50px; background-image: url('/img/pria.png'); background-size: cover">
                            </div>
                        </td>
                        <td>Cedric Kelly</td>
                        <td>cedrickelly</td>
                        <td>Bengkalis</td>
                        <td>22 Januari 2000</td>
                        <td>Jl. Ampera Kp No.15 Tanjungbalai Karimun</td>
                        <td>Mahasiswa</td>

                    </tr>

                    <tr>
                        <td>
                            <div class="rounded-circle"
                                 style="width: 50px; height: 50px; background-image: url('/img/pria.png'); background-size: cover">
                            </div>
                        </td>
                        <td>Cedric Kelly</td>
                        <td>cedrickelly</td>
                        <td>Bengkalis</td>
                        <td>22 Januari 2000</td>
                        <td>Jl. Ampera Kp No.15 Tanjungbalai Karimun</td>
                        <td>Mahasiswa</td>

                    </tr>

                    <tr>
                        <td>
                            <div class="rounded-circle"
                                 style="width: 50px; height: 50px; background-image: url('/img/pria.png'); background-size: cover">
                            </div>
                        </td>
                        <td>Cedric Kelly</td>
                        <td>cedrickelly</td>
                        <td>Bengkalis</td>
                        <td>22 Januari 2000</td>
                        <td>Jl. Ampera Kp No.15 Tanjungbalai Karimun</td>
                        <td>Mahasiswa</td>

                    </tr>

                    <tr>
                        <td>
                            <div class="rounded-circle"
                                 style="width: 50px; height: 50px; background-image: url('/img/wanita.png'); background-size: cover">
                            </div>
                        </td>
                        <td>Cedric Kelly</td>
                        <td>cedrickelly</td>
                        <td>Bengkalis</td>
                        <td>22 Januari 2000</td>
                        <td>Jl. Ampera Kp No.15 Tanjungbalai Karimun</td>
                        <td>Mahasiswa</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

@endsection


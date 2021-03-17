@extends('layouts.app')

@section('title', 'Biodata')

@section('desc', 'Anda dapat memperbarui biodata dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">

            <div class="card mb-4 py-3">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div id="image-profile" class="rounded-circle"
                                 style="width: 200px; height: 200px; background-image: url('/img/pria.png'); background-size: cover">
                            </div>
{{--                            <img class="rounded-circle" src="{{ asset('img/laki.png') }}" width="200"--}}
{{--                                 height="200">--}}
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                            <h4>Abdul Salfikar</h4>
                            <h5 class="text-muted">User</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="card h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Izin Kunjungan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                320
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-6 col-lg-6 col-xl-6">

            <div class="card mb-4">
                <div class="card-header">
                    Informasi Pribadi
                </div>
                <div class="card-body">

                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" value="Abdul Salfikar" disabled>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="salfikar" disabled>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" value="Bengkalis" disabled>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" value="2021-01-30" disabled>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" disabled>Jl. Veteran No.15 Lowokwaru, Malang, Jawa Timur.</textarea>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" value="Wiraswasta" disabled>
                        </div>

                        <div class="form-group mt-2">
                            <a href="{{ route('biodata.edit') }}" class="btn btn-primary">Perbarui</a>
                        </div>

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

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
                                 style="width: 200px; height: 200px; background-image: url('/img/perempuan.png'); background-size: cover">
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                            <h4>{{ auth()->user()->nama_lengkap }}</h4>
                            <small class="text-muted">{{ auth()->user()->roles }}</small>
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

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('biodata.edit') }}" class="btn btn-primary btn-block">Perbarui Biodata</a>
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

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif

                    <form>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" value="{{ auth()->user()->jenis_kelamin }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="{{ auth()->user()->username }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="password" disabled>
                        </div>

{{--                        <div class="form-group mt-2">--}}
{{--                            <a href="{{ route('biodata.edit') }}" class="btn btn-primary">Perbarui</a>--}}
{{--                        </div>--}}

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

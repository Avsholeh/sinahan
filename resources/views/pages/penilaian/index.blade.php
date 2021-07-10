@extends('layouts.app')

@section('title', 'Penilaian')

@section('content')

    @if(session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-4">
            <div id="sangatPuas" class="card bg-success" style="cursor:pointer;">
                <div class="card-body">
                    <div class="d-flex align-items-center text-white">
                        <img class="mr-4" src="{{ asset('img/icon1.png') }}" width="150">
                        <h3>Sangat Puas</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div id="puas" class="card bg-primary" style="cursor:pointer;">
                <div class="card-body">
                    <div class="d-flex align-items-center text-white">
                        <img class="mr-4" src="{{ asset('img/icon2.png') }}" width="150">
                        <h3>Puas</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div id="tidakPuas" class="card bg-danger" style="cursor:pointer;">
                <div class="card-body">
                    <div class="d-flex align-items-center text-white">
                        <img class="mr-4" src="{{ asset('img/icon3.png') }}" width="150">
                        <h3>Tidak Puas</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive overflow-auto">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Penilaian</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($penilaians as $penilaian)
                                    <tr>
                                        <td>{{ $penilaian->id }}</td>
                                        <td>{{ $penilaian->user->nama_lengkap }}</td>
                                        <td>{{ $penilaian->penilaian }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Sangat Puas Modal-->
    <div class="modal fade" id="sangatPuasModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Apakah anda yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin dengan pilihan anda?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('penilaian.store') }}" method="post">
                        @csrf
                        <input type="text" name="penilaian" value="Sangat Puas" class="d-none">
                        <button class="btn btn-primary" type="submit">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sangat Puas Modal-->
    <div class="modal fade" id="puasModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Apakah anda yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin dengan pilihan anda?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('penilaian.store') }}" method="post">
                        @csrf
                        <input type="text" name="penilaian" value="Puas" class="d-none">
                        <button class="btn btn-primary" type="submit">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sangat Puas Modal-->
    <div class="modal fade" id="tidakPuasModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Apakah anda yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin dengan pilihan anda?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('penilaian.store') }}" method="post">
                        @csrf
                        <input type="text" name="penilaian" value="Tidak Puas" class="d-none">
                        <button class="btn btn-primary" type="submit">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
            $("#sangatPuas").click(function () {
                $('#sangatPuasModal').modal('show');
            });
            $("#puas").click(function () {
                $('#puasModal').modal('show');
            });
            $("#tidakPuas").click(function () {
                $('#tidakPuasModal').modal('show');
            });
        });
    </script>

@endsection


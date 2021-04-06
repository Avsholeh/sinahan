@extends('layouts.app')

@section('title', 'Kunjungan')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-5">
                <div class="col">
                    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            @foreach($kunjungans as $kunjungan)

                <div class="row">
                    <div class="col-xl-8 mb-4">
                        <div class="card h-100 py-2">
                            <div class="card-body">

                                <div class="row no-gutters align-items-start">

                                    <div class="col-1 mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            ID
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $kunjungan->id }}
                                        </div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Dibuat pada
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $kunjungan->dibuat_pada }}
                                        </div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pengguna
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $kunjungan->pengguna->nama_lengkap }}
                                        </div>
                                    </div>

                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Narapidana
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $kunjungan->narapidana->nama_lengkap }}
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-8 mr-2 mt-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Keperluan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <small>{{ $kunjungan->keperluan }}</small>
                                            </div>
                                            <div class="col-2 mr-2 mt-4 d-flex align-items-center">
                                                @if($kunjungan->status === \App\Models\Kunjungan::STS_SDH_VERIFIKASI)
                                                    <span class="badge badge-success">
                                            {{ $kunjungan->status }}
                                        </span>
                                                @else
                                                    <span class="badge badge-warning">
                                            {{ $kunjungan->status }}
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <hr>

                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <button class="btn btn-primary btn-icon-split btn-sm mr-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <span class="text">Pengunjung</span>
                                        </button>

                                        <button class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                            <span class="text">Waktu</span>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="#" class="btn btn-success btn-sm mr-2">
                                            Verifikasi
                                        </a>
                                        <a href="#" class="btn btn-warning btn-sm mr-2">
                                            Perbarui
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                            Hapus
                                        </a>
                                        <form action="{{ route('jaksa.delete', $kunjungan->id) }}"
                                              method="post" hidden>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            {{ $kunjungans->links() }}

            {{--            <div class="table-responsive overflow-auto">--}}
            {{--                <table class="table table-bordered" id="dataTable" width="100%">--}}
            {{--                    <thead>--}}
            {{--                    <tr>--}}
            {{--                        <th>ID</th>--}}
            {{--                        <th>Dibuat pada</th>--}}

            {{--                        --}}{{-- FOR TU-PEGAWAI ONLY --}}
            {{--                        @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)--}}
            {{--                            <th>Pengguna</th>--}}
            {{--                        @endif--}}
            {{--                        --}}{{-- END FOR TU-PEGAWAI ONLY --}}

            {{--                        <th>Narapidana</th>--}}
            {{--                        <th>Keperluan</th>--}}
            {{--                        <th>Info</th>--}}
            {{--                        <th>Status</th>--}}

            {{--                        --}}{{-- FOR TU-PEGAWAI ONLY --}}
            {{--                        @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)--}}
            {{--                            <th>Verifikasi</th>--}}
            {{--                        @endif--}}
            {{--                        --}}{{-- END FOR TU-PEGAWAI ONLY --}}

            {{--                        <th>#</th>--}}
            {{--                    </tr>--}}
            {{--                    </thead>--}}
            {{--                    <tbody>--}}

            {{--                    @foreach($kunjungans as $kunjungan)--}}

            {{--                        @can('view', $kunjungan)--}}

            {{--                            <tr>--}}
            {{--                                <td>{{ $kunjungan->id }}</td>--}}
            {{--                                <td>{{ $kunjungan->dibuat_pada }}</td>--}}

            {{--                                --}}{{-- FOR TU-PEGAWAI ONLY --}}
            {{--                                @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)--}}
            {{--                                    <td>{{ $kunjungan->pengguna->nama_lengkap }}</td>--}}
            {{--                                @endif--}}
            {{--                                --}}{{-- END FOR TU-PEGAWAI ONLY --}}

            {{--                                <td>{{ $kunjungan->narapidana->nama_lengkap }}</td>--}}
            {{--                                <td>{{ $kunjungan->keperluan }}</td>--}}

            {{--                                --}}{{-- INFO --}}
            {{--                                <td>--}}
            {{--                                    <div class="d-flex flex-row">--}}
            {{--                                        <button class="btn btn-primary btn-icon-split btn-sm m-1">--}}
            {{--                                            <span class="icon text-white-50">--}}
            {{--                                                <i class="fas fa-user"></i>--}}
            {{--                                            </span>--}}
            {{--                                            <span class="text">Pengunjung</span>--}}
            {{--                                        </button>--}}

            {{--                                        <button class="btn btn-primary btn-icon-split btn-sm m-1">--}}
            {{--                                            <span class="icon text-white-50">--}}
            {{--                                                <i class="fas fa-clock"></i>--}}
            {{--                                            </span>--}}
            {{--                                            <span class="text">Waktu</span>--}}
            {{--                                        </button>--}}
            {{--                                    </div>--}}
            {{--                                </td>--}}
            {{--                                --}}{{-- END INFO --}}

            {{--                                <td>--}}
            {{--                                <span--}}
            {{--                                    class="badge badge-{{ $kunjungan->status === \App\Models\Kunjungan::STS_BLM_VERIFIKASI ? 'danger' : 'primary' }}">--}}
            {{--                                    {{ $kunjungan->status }}--}}
            {{--                                </span>--}}
            {{--                                </td>--}}

            {{--                                @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)--}}
            {{--                                    <td>--}}
            {{--                                        <div class="d-flex flex-row">--}}
            {{--                                            --}}{{-- VERIFY --}}
            {{--                                            @if($kunjungan->status === \App\Models\Kunjungan::STS_BLM_VERIFIKASI)--}}
            {{--                                                <form id="verify-{{ $kunjungan->id }}"--}}
            {{--                                                      action="{{ route('kunjungan.verify', 1) }}"--}}
            {{--                                                      method="post">--}}
            {{--                                                    @csrf--}}
            {{--                                                    @method('post')--}}
            {{--                                                </form>--}}
            {{--                                                <button class="btn btn-success btn-sm mr-2"--}}
            {{--                                                        onclick="event.preventDefault(); document.getElementById('verify-{{ $kunjungan->id }}').submit()">--}}
            {{--                                                    {{ __('layouts.verify') }}--}}
            {{--                                                </button>--}}
            {{--                                                --}}{{-- END --}}
            {{--                                            @else--}}
            {{--                                                --}}{{-- CANCEL VERIFY --}}
            {{--                                                <form id="batal-verify-{{ $kunjungan->id }}"--}}
            {{--                                                      action="{{ route('kunjungan.cancel_verify', 1) }}" method="post">--}}
            {{--                                                    @csrf--}}
            {{--                                                    @method('post')--}}
            {{--                                                </form>--}}
            {{--                                                <button class="btn btn-primary btn-sm text-light mr-2"--}}
            {{--                                                        onclick="event.preventDefault(); document.getElementById('batal-verify-{{ $kunjungan->id }}').submit()">--}}
            {{--                                                    {{ __('layouts.cancel_verify') }}--}}
            {{--                                                </button>--}}
            {{--                                                --}}{{-- END --}}
            {{--                                            @endif--}}
            {{--                                        </div>--}}
            {{--                                    </td>--}}
            {{--                                @endif--}}

            {{--                                <td>--}}
            {{--                                    <div class="d-flex flex-row">--}}
            {{--                                        <a href="{{ route('kunjungan.edit', 1) }}"--}}
            {{--                                           class="btn btn-warning btn-sm text-dark mr-2">--}}
            {{--                                            {{ __('layouts.update') }}--}}
            {{--                                        </a>--}}
            {{--                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">--}}
            {{--                                            {{ __('layouts.delete') }}--}}
            {{--                                        </a>--}}
            {{--                                    </div>--}}
            {{--                                </td>--}}
            {{--                            </tr>--}}

            {{--                        @endcan--}}

            {{--                    @endforeach--}}

            {{--                    </tbody>--}}
            {{--                </table>--}}
        </div>
    </div>
    </div>

    <!-- Hapus Modal-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Apakah anda yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Jika anda memilih untuk menghapus, maka data akan dihapus dari penyimpanan dan
                    tidak dapat dikembalikan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="javascript:void(0)"
                       onclick="event.preventDefault(); document.getElementById('form-delete').submit()"
                    >Konfirmasi</a>
                </div>
                <form id="form-delete" action="#" method="post" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection

@section('css')



@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                columnDefs: [
                    {
                        targets: -5,
                        className: 'no-wrap',
                        width: '200px'
                    }
                ]
            });

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var $siblings = $(this).siblings();
                console.log($siblings);
                $('#konfirmasi').click(function (e) {
                    e.preventDefault();
                    // should check type of siblings
                    // if sibling is not a form
                    // then ignore it
                    console.log($siblings);
                    $siblings('form').submit();
                });
            });
        });
    </script>

@endsection


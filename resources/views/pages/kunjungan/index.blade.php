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

            <div class="table-responsive overflow-auto">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>

                        {{-- FOR TU-PEGAWAI ONLY --}}
                        @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
                            <th>Pengguna</th>
                        @endif
                        {{-- END FOR TU-PEGAWAI ONLY --}}

                        <th>Narapidana</th>
                        <th>Keperluan</th>
                        <th>Status</th>

                        {{-- FOR TU-PEGAWAI ONLY --}}
                        @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
                            <th>Verifikasi</th>
                        @endif
                        {{-- END FOR TU-PEGAWAI ONLY --}}

                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($kunjungans as $kunjungan)

                        <tr>
                            <td>{{ $kunjungan->id }}</td>

                            {{-- FOR TU-PEGAWAI ONLY --}}
                            @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
                                <td>{{ $kunjungan->pengguna->nama_lengkap }}</td>
                            @endif
                            {{-- END FOR TU-PEGAWAI ONLY --}}

                            <td>{{ $kunjungan->narapidana->nama_lengkap }}</td>
                            <td>{{ $kunjungan->keperluan }}</td>
                            <td>
                                <span
                                    class="badge badge-{{ $kunjungan->status === \App\Models\Kunjungan::STS_BLM_VERIFIKASI ? 'danger' : 'primary' }}">
                                    {{ $kunjungan->status }}
                                </span>
                            </td>
                            @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
                                <td>
                                    <div class="d-flex flex-row">
                                        {{-- VERIFY --}}
                                        @if($kunjungan->status === \App\Models\Kunjungan::STS_BLM_VERIFIKASI)
                                            <form id="verify-{{ $kunjungan->id }}"
                                                  action="{{ route('kunjungan.verify', 1) }}"
                                                  method="post">
                                                @csrf
                                                @method('post')
                                            </form>
                                            <button class="btn btn-success btn-sm mr-2"
                                                    onclick="event.preventDefault(); document.getElementById('verify-{{ $kunjungan->id }}').submit()">
                                                {{ __('layouts.verify') }}
                                            </button>
                                            {{-- END --}}
                                        @else
                                            {{-- CANCEL VERIFY --}}
                                            <form id="batal-verify-{{ $kunjungan->id }}"
                                                  action="{{ route('kunjungan.cancel_verify', 1) }}" method="post">
                                                @csrf
                                                @method('post')
                                            </form>
                                            <button class="btn btn-primary btn-sm text-light mr-2"
                                                    onclick="event.preventDefault(); document.getElementById('batal-verify-{{ $kunjungan->id }}').submit()">
                                                {{ __('layouts.cancel_verify') }}
                                            </button>
                                            {{-- END --}}
                                        @endif
                                    </div>
                                </td>
                            @endif

                            <td>
                                <div class="d-flex flex-row">
                                    <a href="{{ route('kunjungan.edit', 1) }}"
                                       class="btn btn-warning btn-sm text-dark mr-2">
                                        {{ __('layouts.update') }}
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                        {{ __('layouts.delete') }}
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
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

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

@endsection


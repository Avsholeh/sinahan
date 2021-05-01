@extends('layouts.app')

@section('title', 'Biodata')

@section('desc', 'Anda dapat memperbarui biodata dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card mb-4 py-2 animated--grow-in">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div id="image-profile" class="rounded-circle"
                                 style="width: 150px; height: 150px; background-image: url('data:image/png;base64,{{ auth()->user()->foto }}'); background-size: cover">
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
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('biodata.edit') }}" class="btn btn-primary btn-block">Perbarui Biodata</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pribadi -->
            <div class="card mb-4 animated--grow-in">
                <div class="card-header">
                    Informasi Pribadi
                </div>
                <div class="card-body h-100">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif

                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                User ID
                            </div>
                        </div>
                        <div class="col">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ auth()->user()->id }}
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nama Lengkap
                            </div>
                        </div>
                        <div class="col">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ auth()->user()->nama_lengkap }}
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jenis Kelamin
                            </div>
                        </div>
                        <div class="col">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ auth()->user()->jenis_kelamin }}
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Username
                            </div>
                        </div>
                        <div class="col">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ auth()->user()->username }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-8 col-lg-8 col-xl-8">

            <div class="card mb-4">
                <div class="card-header">
                    Tambah Biodata Kunjungan
                </div>
                <div class="card-body">
                    <form action="{{ route('dataPengunjung.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('post')

                        {{-- PENGGUNA ID (HIDDEN) --}}
                        <div class="form-group d-none">
                            <label for="nama_lengkap"></label>
                            <input id="pengguna_id" name="pengguna_id" type="text"
                                   value="{{ auth()->user()->id }}">
                        </div>

                        {{-- NAMA LENGKAP --}}
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
                                   value="@if(old('nama_lengkap')) {{ old('nama_lengkap') }}@endif"
                                   aria-describedby="nama_lengkap_help">

                            @error('nama_lengkap')
                            <small id="nama_lengkap_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TEMPAT LAHIR --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                   value="@if(old('tempat_lahir')) {{ old('tempat_lahir') }}@endif"
                                   aria-describedby="tempat_lahir_help">

                            @error('tempat_lahir')
                            <small id="tempat_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                   value="@if(old('tanggal_lahir')) {{ old('tanggal_lahir') }}@endif"
                                   aria-describedby="tanggal_lahir_help">

                            @error('tanggal_lahir')
                            <small id="tanggal_lahir_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- ALAMAT --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" type="text" class="form-control" id="alamat"
                                      aria-describedby="alamat_help">
                                @if(old('alamat')) {{ old('alamat') }}@endif
                            </textarea>

                            @error('alamat')
                            <small id="alamat_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PEKERJAAN --}}
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                   value="@if(old('pekerjaan')) {{ old('pekerjaan') }}@endif"
                                   aria-describedby="pekerjaan_help">

                            @error('pekerjaan')
                            <small id="pekerjaan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- HUBUNGAN --}}
                        <div class="form-group">
                            <label for="hubungan">Hubungan</label>
                            <input name="hubungan" type="text" class="form-control" id="hubungan"
                                   value="@if(old('hubungan')) {{ old('hubungan') }}@endif"
                                   aria-describedby="hubungan_help">

                            @error('hubungan')
                            <small id="hubungan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KTP --}}
                        <div class="form-group">
                            <label for="ktp">KTP</label>
                            <input name="ktp" type="file" class="form-control-file" id="ktp"
                                   value="@if(old('ktp')){{ old('ktp') }}@endif"
                                   aria-describedby="ktp_help">

                            @error('ktp')
                            <small id="ktp_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>


        </div>

    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header">
                    Biodata Kunjungan Anda
                </div>
                <div class="card-body">

                    @if ($message = Session::get('dataPengunjung_success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif

                    @if(count($dataPengunjungs) === 0)

                        <div class="alert alert-danger">
                            <p><i class="fa fa-exclamation-triangle"></i> Anda belum memiliki data pengunjung. Silahkan
                                tambah data pengunjung untuk dapat membuat
                                surat izin kunjungan melalui form diatas!</p>
                        </div>

                    @else

                        <div class="table-responsive overflow-auto">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>Hubungan</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $no = 1 ?>

                                @foreach($dataPengunjungs as $dataPengunjung)

                                    @can('view', $dataPengunjung)

                                        @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN and auth()->user()->id === $dataPengunjung->pengguna_id)
                                            <tr class="bg-gray-200">
                                        @else
                                            <tr>
                                                @endif
                                                <td>{{ $no }}</td>
                                                <td>{{ $dataPengunjung->id }}</td>
                                                <td>{{ $dataPengunjung->nama_lengkap }}</td>
                                                <td>{{ $dataPengunjung->tempat_lahir }}</td>
                                                <td>{{ $dataPengunjung->tanggal_lahir }}</td>
                                                <td>{{ $dataPengunjung->alamat }}</td>
                                                <td>{{ $dataPengunjung->pekerjaan }}</td>
                                                <td>{{ $dataPengunjung->hubungan }}</td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <a href="{{ route('dataPengunjung.edit', $dataPengunjung->id) }}"
                                                           class="btn btn-warning btn-sm text-dark mr-2">
                                                            {{ __('layouts.update') }}
                                                        </a>

                                                        {{-- delete --}}
                                                        <a href="#" class="btn btn-danger btn-sm btn-delete"
                                                           data-toggle="modal"
                                                           data-target="#hapusModal">
                                                            {{ __('layouts.delete') }}
                                                        </a>
                                                        <form
                                                                action="{{ route('dataPengunjung.delete', $dataPengunjung->id) }}"
                                                                method="post"
                                                                hidden>
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        {{-- END delete --}}
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php $no++ ?>

                                        @endcan
                                        @endforeach

                                </tbody>
                            </table>
                        </div>

                    @endif
                </div>
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
                <div class="modal-body">
                    Jika anda memilih untuk menghapus, maka data akan dihapus dari penyimpanan dan
                    tidak dapat dikembalikan.
                </div>

                {{-- delete --}}
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a id="konfirmasi" class="btn btn-primary" href="javascript:void(0)">Konfirmasi</a>
                </div>
                {{-- END delete --}}

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

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var $siblings = $(this).siblings();
                console.log($siblings);
                $('#konfirmasi').click(function (e) {
                    e.preventDefault();
                    // should check type of siblings
                    // if sibling is not a form
                    // then ignore it
                    $siblings[1].submit();
                });
            });
        });
    </script>

@endsection

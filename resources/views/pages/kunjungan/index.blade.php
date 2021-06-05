@extends('layouts.app')

@section('title', 'Kunjungan')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            @if(count($kunjungans) > 0)

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
                                                Diajukan oleh
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

                                    </div>

                                    <div class="row">
                                        <div class="col-6 mr-2 mt-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Keperluan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <small>{{ $kunjungan->keperluan }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mr-2 mt-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengunjung
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if($kunjungan->dataPengunjungKunjungan->count() > 0)
                                                    @foreach($kunjungan->dataPengunjungKunjungan as $dataPengunjungKunjungan)
                                                        <small>
                                                            ({{ $loop->iteration }}
                                                            ) {{ $dataPengunjungKunjungan->dataPengunjung->nama_lengkap }}
                                                        </small>
                                                    @endforeach
                                                @else
                                                    <small>Belum tersedia</small>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mr-2 mt-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Waktu Kunjungan
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if($kunjungan->waktuKunjungan->count() > 0)
                                                    @foreach($kunjungan->waktuKunjungan as $waktuKunjungan)
                                                        <small>{{ $waktuKunjungan->tanggal }},
                                                            {{ $waktuKunjungan->dari_jam }} -
                                                            {{ $waktuKunjungan->hingga_jam }}</small>
                                                    @endforeach
                                                @else
                                                    <small>Belum tersedia</small>
                                                @endif
                                            </div>

                                        </div>
                                    </div>


                                    <hr>


                                    <div class="row align-content-center">
                                        <div class="col-6">
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

                                        <div class="col-6 d-flex justify-content-end">

                                            @if (auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)

                                                @if($kunjungan->status === \App\Models\Kunjungan::STS_BLM_VERIFIKASI)
                                                    <a href="{{ route('kunjungan.verifikasi.create', $kunjungan->id) }}"
                                                       class="btn btn-success btn-sm mr-2">
                                                        Verifikasi
                                                    </a>
                                                    <a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                       class="btn btn-warning btn-sm mr-2 d-inline-block">
                                                        Perbarui
                                                    </a>
                                                @else
                                                    <a href="{{ route('kunjungan.genpdf', $kunjungan->id) }}"
                                                       class="btn btn-danger btn-sm mr-2 d-inline-block">
                                                        <i class="fa fa-file-pdf"></i> PDF
                                                    </a>
                                                @endif

                                                {{--<a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                   class="btn btn-warning btn-sm mr-2 d-inline-block">
                                                    Perbarui
                                                </a>--}}

                                                <a class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                                   data-target="#hapusModal">
                                                    Hapus
                                                </a>

                                                <form action="{{ route('kunjungan.delete', $kunjungan->id) }}"
                                                      method="post" hidden>
                                                    @csrf
                                                    @method('delete')
                                                </form>

                                            @else

                                                @if($kunjungan->status === \App\Models\Kunjungan::STS_SDH_VERIFIKASI)
                                                    <a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                       class="btn btn-warning btn-sm mr-2 d-inline-block">
                                                        Perbarui
                                                    </a>
                                                @endif

                                                <a class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                                   data-target="#hapusModal">
                                                    Hapus
                                                </a>

                                                <form action="{{ route('kunjungan.delete', $kunjungan->id) }}"
                                                      method="post" hidden>
                                                    @csrf
                                                    @method('delete')
                                                </form>

                                            @endif

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                {{ $kunjungans->links() }}

            @else

                <div class="alert alert-danger">
                    Anda belum memiliki kunjungan!
                </div>

            @endif

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
            </div>
        </div>
    </div>

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
                var $form = $(this).siblings('form');
                // console.log($siblings);
                $('#konfirmasi').click(function (e) {
                    e.preventDefault();
                    // should check type of siblings
                    // if sibling is not a form
                    // then ignore it
                    $form.submit();
                });
            });
        });
    </script>

@endsection


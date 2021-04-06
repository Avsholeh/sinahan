@extends('layouts.app')

@section('title', 'Sidang')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-4">
                <div class="col">
                    <a href="{{ route('sidang.create') }}" class="btn btn-primary">Tambah Baru</a>
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
                        <th>Tanggal</th>
                        <th>Hakim</th>
                        <th>Jaksa</th>
                        <th>Narapidana</th>
                        <th>Pasal</th>
                        <th>Keterangan</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($sidangs as $sidang)

                        <tr>
                            <td>{{ $sidang->id }}</td>
                            <td class="font-weight-bold">{{ $sidang->tanggal_idn }}</td>
                            <td>
                                @if($sidang->hakim)
                                    {{ $sidang->hakim->nama_lengkap }}
                                @else
                                    <div class="badge badge-danger">Tidak Ada</div>
                                @endif
                            </td>
                            <td>
                                @if($sidang->jaksa)
                                    {{ $sidang->jaksa->nama_lengkap }}
                                @else
                                    <div class="badge badge-danger">Tidak Ada</div>
                                @endif
                            </td>
                            <td>
                                @if($sidang->narapidana)
                                    {{ $sidang->narapidana->nama_lengkap }}
                                @else
                                    <div class="badge badge-danger">Tidak Ada</div>
                                @endif
                            </td>
                            <td>{{ $sidang->pasal }}</td>
                            <td>{{ $sidang->keterangan }}</td>

                            <td class="d-flex flex-row">
                                <a href="{{ route('sidang.edit', $sidang->id) }}"
                                   class="btn btn-warning btn-sm text-dark mr-2">
                                    {{ __('layouts.update') }}
                                </a>
                                {{-- delete --}}
                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                   data-target="#hapusModal">
                                    {{ __('layouts.delete') }}
                                </a>
                                <form action="{{ route('sidang.delete', $sidang->id) }}" method="post" hidden>
                                    @csrf
                                    @method('delete')
                                </form>
                                {{-- END delete --}}
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


@extends('layouts.app')

@section('title', 'Hakim')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-4">
                <div class="col">
                    <a href="{{ route('hakim.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            <div class="table-responsive overflow-auto">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Pangkat</th>
                        <th>Golongan</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($hakims as $hakim)

                        <tr>
                            <td>
                                <div class="rounded-circle"
                                     style="width: 50px; height: 50px; background-image: url('data:image/png;base64,{{ $hakim->foto }}'); background-size: cover"></div>
                            </td>
                            <td>{{ $hakim->nama_lengkap }}</td>
                            <td>{{ $hakim->nip }}</td>
                            <td>{{ $hakim->tempat_lahir }}</td>
                            <td>{{ $hakim->tanggal_lahir }}</td>
                            <td>{{ $hakim->pangkat }}</td>
                            <td>{{ $hakim->golongan }}</td>
                            <td>{{ $hakim->agama }}</td>
                            <td>{{ $hakim->jenis_kelamin }}</td>
                            <td>{{ $hakim->pendidikan }}</td>
                            <td>
                                @if($hakim->status === \App\Models\Hakim::AKTIF)
                                    <div class="badge badge-success">{{ $hakim->status }}</div>
                                @else
                                    <div class="badge badge-danger">{{ $hakim->status }}</div>
                                @endif
                            </td>

                            <td class="d-flex flex-row">
                                <a href="{{ route('hakim.edit', $hakim->id) }}" class="btn btn-warning btn-sm text-dark mr-2">
                                    {{ __('layouts.update') }}
                                </a>
                                {{-- delete --}}
                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                   data-target="#hapusModal">
                                    {{ __('layouts.delete') }}
                                </a>
                                <form id="form-delete-{{ $hakim->id }}"
                                      action="{{ route('hakim.delete', $hakim->id) }}"
                                      method="post" hidden>
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

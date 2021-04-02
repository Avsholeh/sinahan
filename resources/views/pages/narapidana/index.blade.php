@extends('layouts.app')

@section('title', 'Narapidana')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-4">
                <div class="col">
                    <a href="{{ route('narapidana.create') }}" class="btn btn-primary">Tambah Baru</a>
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
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kebangsaan</th>
                        <th>Tempat Tinggal</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Reg Perkara</th>
                        <th>Reg Tahanan</th>
                        <th>Reg Bukti</th>
{{--                        <th>Kategori</th>--}}
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($narapidanas as $narapidana)

                        <tr>
                            <td>
                                <div class="rounded-circle"
                                     style="width: 50px; height: 50px; background-image: url('data:image/png;base64,{{ $narapidana->foto }}'); background-size: cover">
                                </div>
                            </td>

                            <td>{{ $narapidana->nama_lengkap }}</td>
                            <td>{{ $narapidana->tempat_lahir }}</td>
                            <td>{{ $narapidana->tanggal_lahir }}</td>
                            <td>{{ $narapidana->jenis_kelamin }}</td>
                            <td>{{ $narapidana->kebangsaan }}</td>
                            <td>{{ $narapidana->tempat_tinggal }}</td>
                            <td>{{ $narapidana->agama }}</td>
                            <td>{{ $narapidana->pekerjaan }}</td>
                            <td>{{ $narapidana->pendidikan }}</td>
                            <td>{{ $narapidana->reg_perkara }}</td>
                            <td>{{ $narapidana->reg_tahanan }}</td>
                            <td>{{ $narapidana->reg_bukti }}</td>
{{--                            <td>{{ $narapidana->kategori }}</td>--}}
                            <td>{{ $narapidana->keterangan }}</td>

                            <td>
                                @if($narapidana->status === \App\Models\Narapidana::AKTIF)
                                    <div class="badge badge-success">{{ $narapidana->status }}</div>
                                @else
                                    <div class="badge badge-danger">{{ $narapidana->status }}</div>
                                @endif
                            </td>

                            <td>
{{--                                <span class="d-flex flex-row">--}}
                                <a href="{{ route('narapidana.edit', $narapidana->id) }}"
                                   class="btn btn-warning btn-sm text-dark mr-2">
                                    {{ __('layouts.update') }}
                                </a>
                                {{-- delete --}}
                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal"
                                   data-target="#hapusModal">
                                    {{ __('layouts.delete') }}
                                </a>
                                <form id="form-delete-{{ $narapidana->id }}"
                                      action="{{ route('narapidana.delete', $narapidana->id) }}"
                                      method="post" hidden>
                                    @csrf
                                    @method('delete')
                                </form>
                                {{-- END delete --}}
{{--                                </span>--}}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

{{--    @include('layouts.confirmation_modal')--}}
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
                responsive: false
            });

            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var $siblings = $(this).siblings();
                $('#konfirmasi').click(function (e) {
                    e.preventDefault();
                    // should check type of siblings
                    // if sibling is not a form then ignore it
                    $siblings[1].submit();
                });
            });
        });
    </script>

@endsection


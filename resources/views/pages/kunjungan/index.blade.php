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
            <div class="table-responsive overflow-auto">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Narapidana</th>
                        <th>Berlaku Hingga</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach(['BELUM DISETUJUI','BELUM DISETUJUI','BELUM DISETUJUI','TELAH DISETUJUI','TELAH DISETUJUI'] as $status)

                        <tr>
                            <td>{{ $faker->name }}</td>
                            <td>{{ $faker->date('Y-m-d') }}</td>
                            <td>{{ $faker->text }}</td>
                            <td>
                                <span class="badge badge-{{ $status === 'TELAH DISETUJUI' ? 'success' : 'primary' }}">
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('kunjungan.edit', 1) }}"
                                   class="btn btn-warning btn-sm text-dark mr-2">
                                    {{ __('layouts.update') }}
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal">
                                    {{ __('layouts.delete') }}
                                </a>
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


@extends('layouts.app')

@section('title', 'Jaksa')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-5">
                <div class="col">
                    <button class="btn btn-primary">Tambah Baru</button>
                </div>
            </div>
            <div class="table-responsive overflow-auto">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Pangkat/Golongan</th>
                        <th>Jabatan</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach([1,2,3,4,5] as $key)

                        <tr>
                            <td>
                                <div class="rounded-circle"
                                     style="width: 50px; height: 50px; background-image: url('/img/pria.png'); background-size: cover">
                                </div>
                            </td>
                            <td>{{ $faker->name }}</td>
                            <td>{{ $faker->creditCardNumber }}</td>
                            <td>{{ $faker->country }}</td>
                            <td>{{ $faker->date('Y-m-d') }}</td>
                            <td>III A / Penata Muda</td>
                            <td>Hakim</td>
                            <td>Islam</td>
                            <td>Laki-Laki</td>
                            <td>SII</td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('jaksa.edit', 1) }}" class="btn btn-warning btn-sm text-dark mr-2">
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@endsection


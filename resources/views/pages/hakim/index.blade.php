@extends('layouts.app')

@section('title', 'Hakim')

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
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    $(document).ready(function() {
    $('#dataTable').DataTable();
    });

@endsection


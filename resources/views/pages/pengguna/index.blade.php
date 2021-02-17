@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="row mb-5">
                <div class="col">
                    <button class="btn btn-primary">Tambah Baru</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach([1,2,3,4,5] as $key)

                    <tr>
                        <td>
                            <div class="rounded-circle"
                                 style="width: 50px; height: 50px; background-image: url('/img/wanita.png'); background-size: cover">
                            </div>
                        </td>
                        <td>{{ $faker->name }}</td>
                        <td>{{ $faker->userName }}</td>
                        <td>{{ $faker->city }}</td>
                        <td>{{ $faker->date('Y-m-d') }}</td>
                        <td>{{ $faker->text }}</td>
                        <td>{{ $faker->jobTitle }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Perbarui</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
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


@extends('layouts.app')

@section('title', 'Narapidana')

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
                        <th>Tempat/Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kebangsaan</th>
                        <th>Tempat Tinggal</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach([1,2,3,4,5] as $key)

                            <td>
                                <div class="rounded-circle"
                                     style="width: 50px; height: 50px; background-image: url('/img/pria.png'); background-size: cover">
                                </div>
                            </td>
                            <td>{{ $faker->name }}</td>
                            <td>{{ $faker->city }} / {{ $faker->date('d M Y') }}</td>
                            <td>{{ $faker->randomElement(['Laki Laki', 'Perempuan']) }}</td>
                            <td>{{ $faker->randomElement(['Indonesia', 'Malaysia', 'Singapura']) }}</td>
                            <td>{{ $faker->city }}</td>
                            <td>{{ $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha']) }}</td>
                            <td>{{ $faker->randomElement(['Wiraswasta', 'Buruh']) }}</td>
                            <td>{{ $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1']) }}</td>
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


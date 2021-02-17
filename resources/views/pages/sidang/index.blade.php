@extends('layouts.app')

@section('title', 'Sidang')

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
                        <th>Tanggal</th>
                        <th>Narapidana</th>
                        <th>Pasal</th>
                        <th>JPU</th>
                        <th>Hakim</th>
                        <th>Keterangan</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach([1,2,3,4,5] as $key)

                        <tr>
                            <td>{{ $faker->date }}</td>
                            <td>{{ $faker->name }}</td>
                            <td>{{ $faker->randomElement(['UU RI No. 17/2006', 'UU RI No. 35/2006', 'UU RI No. 35/2009' ]) }}</td>
                            <td>{{ $faker->name }}, S.H</td>
                            <td>{{ $faker->name }}, S.H</td>
                            <td>{{ $faker->randomElement(['Tuntutan', 'Pledoi', 'Ket.Saksi']) }}</td>
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


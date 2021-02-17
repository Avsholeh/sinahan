@extends('layouts.app')

@section('title', 'Kunjungan')

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
                        <th>Narapidana</th>
                        <th>Berlaku Hingga</th>
                        <th>Keperluan</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $faker = \Faker\Factory::create() ?>

                    @foreach([1,2,3,4,5] as $key)

                    <tr>
                        <td>{{ $faker->name }}</td>
                        <td>{{ $faker->date('Y-m-d') }}</td>
                        <td>{{ $faker->text }}</td>
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
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

@endsection


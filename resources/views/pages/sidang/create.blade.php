@extends('layouts.app')

@section('title', 'Tambah Sidang')

@section('desc', 'Anda dapat menambahkan Jadwal sidang dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="tanggal">Nama Lengkap</label>
                            <input name="tanggal" type="datetime-local" class="form-control" id="tanggal"
                                   aria-describedby="tanggal_help">
                        </div>

                        <?php $faker = \Faker\Factory::create() ?>

                        <div class="form-group">
                            <label for="hakim">Hakim</label>
                            <select name="hakim" id="hakim" class="form-control">
                                <option disabled selected>Pilih Hakim</option>
                                @foreach([1,2,3,4,5] as $number)
                                <option value="{{ $number }}">{{ $faker->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hakim">Narapidana</label>
                            <select name="hakim" id="hakim" class="form-control">
                                <option disabled selected>Pilih Narapidana</option>
                                @foreach([1,2,3,4,5] as $number)
                                    <option value="{{ $number }}">{{ $faker->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pasal">Pasal</label>
                            <input name="pasal" type="text" class="form-control" id="pasal"
                                   aria-describedby="pasal_help">
                        </div>

                        <div class="form-group">
                            <label for="jpu">JPU</label>
                            <input name="jpu" type="text" class="form-control" id="jpu">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input name="keterangan" type="text" class="form-control" id="keterangan">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

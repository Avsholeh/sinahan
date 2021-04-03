@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('desc', 'Anda dapat menambahkan Kunjungan dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <!-- KUNJUNGAN -->
            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <select name="narapidana" id="narapidana" class="form-control">
                                <option disabled selected>Narapidana yang akan dikunjungi</option>
                                <?php $faker = \Faker\Factory::create(); $index = 1  ?>

                                @while($index < 100)
                                <option value="0">{{ $faker->name }}</option>
                                <?php $index++ ?>
                                @endwhile

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="3"
                                      aria-describedby="keperluan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kunjungan.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
            <!-- END KUNJUNGAN -->
        </div>
    </div>

@endsection

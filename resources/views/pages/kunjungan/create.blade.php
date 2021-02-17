@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('desc', 'Anda dapat menambahkan Kunjungan dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <input name="narapidana" type="text" class="form-control" id="narapidana" aria-describedby="narapidana_help">
                        </div>

                        <div class="form-group">
                            <label for="berlaku">Berlaku Hingga</label>
                            <input name="berlaku" type="date" class="form-control" id="berlaku" aria-describedby="berlaku" value="2021-02-01" disabled>
                        </div>

                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea class="form-control" name="keperluan" id="keperluan" cols="30" rows="3" aria-describedby="keperluan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

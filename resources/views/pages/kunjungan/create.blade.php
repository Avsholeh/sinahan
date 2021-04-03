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
                        {{-- NARAPIDANA --}}
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <select name="narapidana" id="narapidana" class="form-control chosen-select">
                                <option value="" disabled selected>Pilih narapidana</option>
                                @foreach($narapidanas as $narapidana)
                                <option value="{{ $narapidana->id }}">{{ $narapidana->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- DATA PENGUNJUNG --}}
                        <div class="form-group">
                            <label for="data_pengunjung">Data Pengunjung</label>

                            @if(count($dataPengunjungs))

                                <select multiple name="data_pengunjung" id="data_pengunjung"
                                        class="form-control chosen-select">
                                    @foreach($dataPengunjungs as $dataPengunjung)
                                        <option
                                            value="{{ $dataPengunjung->id }}" @if(old('data_pengunjung') === 'Aktif'){{ 'selected' }}@endif>
                                            {{ $dataPengunjung->nama_lengkap }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <div class="alert alert-danger">
                                    Anda tidak memiliki data pengunjung. Silahkan tambah data pengunjung melalui tombol
                                    dibawah ini!
                                </div>
                                <a class="btn btn-warning btn-sm text-dark" href="{{ route('data_pengunjung.create') }}"><i class="fas fa-plus pr-3"></i>Tambah
                                    Data Pengunjung</a>

                            @endif
                        </div>

                        {{-- KEPERLUAN --}}
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="3"
                                      aria-describedby="keperluan"></textarea>
                        </div>

                        <div class="data-pengunjung">

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

@section('scripts')

    <script>
        $(document).ready(function () {
            $(".chosen-select").chosen({
                allow_single_deselect: true,
                no_results_text: "Tidak ditemukan"
            })
        });
    </script>

@endsection

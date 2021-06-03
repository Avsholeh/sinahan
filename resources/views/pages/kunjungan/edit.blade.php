@extends('layouts.app')

@section('title', 'Perbarui Kunjungan')

@section('desc', 'Anda dapat memperbarui Kunjungan dengan form dibawah ini.')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <!-- KUNJUNGAN -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <input name="pengguna_id" class="d-none" type="text" value="{{ $kunjungan->pengguna_id }}">

                        {{-- DATA PENGUNJUNG --}}
                        <div class="form-group">
                            <label for="data_pengunjung">Data Pengunjung</label>

                            @if(count($dataPengunjungs))


                                <select multiple name="data_pengunjung[]" id="data_pengunjung"
                                        class="form-control chosen-select">
                                    @foreach($dataPengunjungs as $dataPengunjung)
                                        <option
                                                value="{{ $dataPengunjung->id }}"
                                        @if($kunjungan->dataPengunjungKunjungan->contains('data_pengunjung_id', $dataPengunjung->id)){{ 'selected' }}@endif
                                        >
                                            ID:{{ $dataPengunjung->id }} - {{ $dataPengunjung->nama_lengkap }}
                                        </option>
                                    @endforeach
                                </select>

                            @else

                                <div class="alert alert-danger">
                                    Anda tidak memiliki data pengunjung. Silahkan tambah data pengunjung melalui tombol
                                    dibawah ini!
                                </div>

                            @endif

                            @error('data_pengunjung')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror

                            <a class="btn btn-primary btn-icon-split btn-sm mt-3" data-toggle="modal"
                               data-target="#tambahDataPengunjungModal" data-backdrop="static"
                               data-keyboard="false">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                <span class="text">Tambah Data Pengunjung</span>
                            </a>
                        </div>
                        {{-- END DATA PENGUNJUNG --}}

                        {{-- NARAPIDANA --}}
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <select name="narapidana_id" id="narapidana" class="form-control chosen-select">
                                <option value="" disabled selected>Pilih narapidana</option>
                                @foreach($narapidanas as $narapidana)
                                    <option
                                            value="{{ $narapidana->id }}"
                                    @if($kunjungan->narapidana->id === $narapidana->id){{ 'selected' }}@endif
                                    >{{ $narapidana->nama_lengkap }}
                                        ({{ $narapidana->jenis_kelamin }}) ({{ $narapidana->status }})
                                    </option>
                                @endforeach
                            </select>

                            @error('narapidana_id')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KEPERLUAN --}}
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="3"
                                      aria-describedby="keperluan">{{ $kunjungan->keperluan }}</textarea>

                            @error('keperluan')
                            <small id="data_pengunjung_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kunjungan.index') }}" type="submit" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
            <!-- END KUNJUNGAN -->
        </div>
    </div>

    <!-- TAMBAH DATA PENGUNJUNG-->
    <div class="modal fade" id="tambahDataPengunjungModal" tabindex="-1" role="dialog"
         aria-labelledby="tambahDataPengunjungModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataPengunjungModalLabel">Tambah Biodata Kunjungan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    @include('pages.data_pengunjung.create_modal')

                </div>

            </div>
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

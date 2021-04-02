@extends('layouts.app')

@section('title', 'Perbarui Sidang')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('sidang.update', $sidang->id) }}" method="post"
                          enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        {{-- TANGGAL --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input name="tanggal" type="datetime-local" class="form-control" id="tanggal"
                                   value="{{ $sidang->new_tanggal }}"
                                   aria-describedby="tanggal_help">

                            @error('tanggal')
                            <small id="tanggal_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- HAKIM --}}
                        <div class="form-group">
                            <label for="hakim">Hakim</label>
                            <select name="hakim_id" id="hakim" class="form-control" aria-describedby="hakim_help">
                                <option disabled selected>Pilih Hakim</option>
                                @foreach($hakims as $hakim)
                                    @if($sidang->hakim and $sidang->hakim->id === $hakim->id)
                                        <option selected value="{{ $hakim->id }}">{{ $hakim->nama_lengkap }}</option>
                                    @else
                                        <option value="{{ $hakim->id }}">{{ $hakim->nama_lengkap }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('hakim_id')
                            <small id="hakim_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- JAKSA --}}
                        <div class="form-group">
                            <label for="jaksa">Jaksa</label>
                            <select name="jaksa_id" id="jaksa" class="form-control" aria-describedby="jaksa_help">
                                <option disabled selected>Pilih Jaksa</option>
                                @foreach($jaksas as $jaksa)
                                    @if($sidang->jaksa and $sidang->jaksa->id === $jaksa->id)
                                        <option selected value="{{ $jaksa->id }}">{{ $jaksa->nama_lengkap }}</option>
                                    @else
                                        <option value="{{ $jaksa->id }}">{{ $jaksa->nama_lengkap }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('jaksa_id')
                            <small id="jaksa_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- NARAPIDANA --}}
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <select name="narapidana_id" id="narapidana" class="form-control"
                                    aria-describedby="narapidana_help">
                                <option disabled selected>Pilih Narapidana</option>
                                @foreach($narapidanas as $narapidana)
                                    @if($sidang->narapidana and $sidang->narapidana->id === $narapidana->id)
                                        <option selected
                                                value="{{ $narapidana->id }}">{{ $narapidana->nama_lengkap }}</option>
                                    @else
                                        <option value="{{ $narapidana->id }}">{{ $narapidana->nama_lengkap }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('narapidana_id')
                            <small id="narapidana_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- PASAL --}}
                        <div class="form-group">
                            <label for="pasal">Pasal</label>
                            <input name="pasal" type="text" class="form-control" id="pasal"
                                   value="{{ $sidang->pasal }}"
                                   aria-describedby="pasal_help">

                            @error('pasal')
                            <small id="pasal_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" id="keterangan" class="form-control"
                                    aria-describedby="keterangan_help">
                                <option disabled selected>Pilih Keterangan</option>
                                <option
                                    @if($sidang->keterangan === \App\Models\Sidang::KET_SAKSI){{ 'selected' }}@endif
                                    value="{{ \App\Models\Sidang::KET_SAKSI }}">{{ \App\Models\Sidang::KET_SAKSI }}</option>
                                <option
                                    @if($sidang->keterangan === \App\Models\Sidang::KET_PUTUSAN){{ 'selected' }}@endif
                                    value="{{ \App\Models\Sidang::KET_PUTUSAN }}">{{ \App\Models\Sidang::KET_PUTUSAN }}</option>
                                <option
                                    @if($sidang->keterangan === \App\Models\Sidang::KET_DAKWAAN){{ 'selected' }}@endif
                                    value="{{ \App\Models\Sidang::KET_DAKWAAN }}">{{ \App\Models\Sidang::KET_DAKWAAN }}</option>
                                <option
                                    @if($sidang->keterangan === \App\Models\Sidang::KET_TUNTUTAN){{ 'selected' }}@endif
                                    value="{{ \App\Models\Sidang::KET_TUNTUTAN }}">{{ \App\Models\Sidang::KET_TUNTUTAN }}</option>
                                <option
                                    @if($sidang->keterangan === \App\Models\Sidang::KET_BUKAN_TAHANAN_JAKSA){{ 'selected' }}@endif
                                    value="{{ \App\Models\Sidang::KET_BUKAN_TAHANAN_JAKSA }}">{{ \App\Models\Sidang::KET_BUKAN_TAHANAN_JAKSA }}</option>
                            </select>

                            @error('keterangan')
                            <small id="keterangan_help" class="form-text text-danger">
                                <i class="fa fa-info-circle"></i> {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

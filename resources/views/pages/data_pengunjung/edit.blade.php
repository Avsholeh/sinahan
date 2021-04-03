@extends('layouts.app')

@section('title', 'Perbarui Kunjungan')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <!-- KUNJUNGAN -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="narapidana">Narapidana</label>
                            <input name="narapidana" type="text" class="form-control" id="narapidana"
                                   aria-describedby="narapidana_help">
                        </div>

                        <div class="form-group">
                            <label for="berlaku">Berlaku Hingga</label>
                            <input name="berlaku" type="date" class="form-control" id="berlaku"
                                   aria-describedby="berlaku" value="" readonly>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input name="status" type="text" class="form-control" id="status"
                                   aria-describedby="status" value="BELUM DISETUJUI" readonly>
                        </div>

                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea name="keperluan" class="form-control" id="keperluan" cols="30" rows="3"
                                      aria-describedby="keperluan"></textarea>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
            <!-- END KUNJUNGAN -->
        </div>
    </div>

@endsection

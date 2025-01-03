<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Izin Kunjungan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $kunjungans->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kunjungan Terakhir
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if($kunjungans->count() > 0)
                                {{ $kunjungans->first()->dibuat_pada }}
                            @else
                                Belum ada
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Status Kunjungan Terakhir
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if($kunjungans->count() > 0)
                                {{ $kunjungans->first()->status }}
                            @else
                                Belum ada
                            @endif

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
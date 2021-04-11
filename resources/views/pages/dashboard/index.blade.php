@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- Dashboard info for admin --}}
    @if(auth()->user()->roles === \App\Models\Pengguna::ROLES_ADMIN)
        @include('pages.dashboard.admin')
    @else
        @include('pages.dashboard.user')
    @endif

    <div class="row">

        <!-- Grafik izin kunjungan -->
        <div class="col-lg-8 col-xl-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Izin Kunjungan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart" width="446" height="320" class="chartjs-render-monitor"
                                style="display: block; width: 446px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kunjungan terakhir -->
        <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kunjungan terakhir</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    @foreach($lastKunjungan as $kunjungan)
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-4">
                                        <strong>Dibuat pada: </strong>
                                        <span>{{ $kunjungan->dibuat_pada }}</span>
                                    </div>

                                    <div class="col-4">
                                        <strong>Narapidana: </strong>
                                        <span>{{ $kunjungan->narapidana->nama_lengkap }}</span>
                                    </div>

                                    <div class="col-4">
                                        <span class="badge badge-success">{{ $kunjungan->status }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {{--    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>--}}
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

@endsection

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
        <div class="col-xl-6">
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
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kunjungan terakhir</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    @if($lastKunjungan->count() > 0)
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
                    @else

                        <div class="alert alert-danger">
                            Anda belum memiliki kunjungan! Silahkan buat izin kunjungan melalui link berikut ini.
                            <a href="{{ route('kunjungan.create') }}">Buat kunjungan</a>
                        </div>

                    @endif

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
{{--    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>--}}

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($grafiks as $grafik)
                    "{{ $grafik->bulan }}",
                    @endforeach
                    ],
                datasets: [{
                    label: "Total Kunjungan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        @foreach($grafiks as $grafik)
                            {{ $grafik->total }},
                        @endforeach
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            // callback: function (value, index, values) {
                            //     return number_format(value);
                            // }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    // callbacks: {
                    //     label: function (tooltipItem, chart) {
                    //         var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    //         return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                    //     }
                    // }
                }
            }
        });
    </script>

@endsection

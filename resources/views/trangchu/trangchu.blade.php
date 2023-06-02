@extends('index')

@section('title')
    <title>NESOL | Trang chủ</title>
@endsection

@section('header')
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon.css') }}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/fullcalendar.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('public/js/modernizr-3.6.0.min.js') }}"></script>
@endsection

@section('contents')
    <!-- Dashboard summery Start Here -->
    <div class="row gutters-20">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-classmates text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Tài xế</div>
                            <div class="item-number"><?php echo number_format($all_taixe)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-multiple-users-silhouette text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Khách hàng</div>
                            <div class="item-number"><?php echo number_format($all_khachhang)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="flaticon-couple text-orange"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Đơn hàng</div>
                            <div class="item-number"><?php echo number_format($all_donhang)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Doanh thu</div>
                            <div class="item-number"><?php echo number_format($doanhthu)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard summery End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
        <div class="col-12 col-xl-12 col-12-xxxl">
            <div class="card dashboard-card-one pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Biểu đồ doanh thu</h3>
                        </div>
                    </div>
                    <div class="earning-chart-wrap">
                        <canvas id="line-chart" width="660" height="320"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12 col-12-xxxl">
            <div class="card dashboard-card-two pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Biểu đồ thống kê đơn hàng</h3>
                        </div>
                        <div class="item-title">
                            <label>Tháng</label>
                            <select class="select2" id="namT">
                                <option value="">Chọn năm</option>
                                <option value="1" {{\Carbon\Carbon::today()->format('m') == 1 ? 'selected' : ''}}>Tháng 1</option>
                                <option value="2" {{\Carbon\Carbon::today()->format('m') == 2 ? 'selected' : ''}}>Tháng 2</option>
                                <option value="3" {{\Carbon\Carbon::today()->format('m') == 3 ? 'selected' : ''}}>Tháng 3</option>
                                <option value="4" {{\Carbon\Carbon::today()->format('m') == 4 ? 'selected' : ''}}>Tháng 4</option>
                                <option value="5" {{\Carbon\Carbon::today()->format('m') == 5 ? 'selected' : ''}}>Tháng 5</option>
                                <option value="6" {{\Carbon\Carbon::today()->format('m') == 6 ? 'selected' : ''}}>Tháng 6</option>
                                <option value="7" {{\Carbon\Carbon::today()->format('m') == 7 ? 'selected' : ''}}>Tháng 7</option>
                                <option value="8" {{\Carbon\Carbon::today()->format('m') == 8 ? 'selected' : ''}}>Tháng 8</option>
                                <option value="9" {{\Carbon\Carbon::today()->format('m') == 9 ? 'selected' : ''}}>Tháng 9</option>
                                <option value="10" {{\Carbon\Carbon::today()->format('m') == 10 ? 'selected' : ''}}>Tháng 10</option>
                                <option value="11" {{\Carbon\Carbon::today()->format('m') == 11 ? 'selected' : ''}}>Tháng 11</option>
                                <option value="12" {{\Carbon\Carbon::today()->format('m') == 12 ? 'selected' : ''}}>Tháng 12</option>
                                <option value="{{\Carbon\Carbon::today()->format('Y')}}">Cả năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="expense-chart-wrap">
                        <canvas id="mychart" width="100" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-12 col-12-xxxl">
            <div class="card dashboard-card-six pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Hóa đơn chưa thanh toán</h3>
                        </div>
                    </div>
                    <h4 class="font-bold">{{$dh_thanhtoan}}</h4>
                    <div class="notice-box-wrap">
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap" id="hoadon">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Phí thuê xe</th>
                                    <th>Phí phát nâng</th>
                                    <th>Phí hạ</th>
                                    <th>Phí xếp dỡ</th>
                                    <th>Phí giấy tờ</th>
                                    <th>Phí lưu ca</th>
                                    <th>Vé cầu đường</th>
                                    <th>Phí khác</th>
                                    <th>Thuế GTGT</th>
                                    <th>Tổng tiền</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=0)
                                @foreach($hoadon as $key => $hd)
                                    @php($i++)
                                    <tr>
                                        <td>{{$hd->hoadon_id}}</td>
                                        <td>{{$hd->ten_kh}}</td>
                                        <td>{{$hd->donhang_id}}</td>
                                        <td>{{ \Carbon\Carbon::parse($hd->created_at)->format('d/m/Y') }}</td>
                                        <td><?php echo number_format($hd->phithuexe)?></td>
                                        <td><?php echo number_format($hd->phinang)?></td>
                                        <td><?php echo number_format($hd->phixepdo)?></td>
                                        <td><?php echo number_format($hd->phiha)?></td>
                                        <td><?php echo number_format($hd->phigiayto)?></td>
                                        <td><?php echo number_format($hd->philuuca)?></td>
                                        <td><?php echo number_format($hd->handing)?></td>
                                        <td><?php echo number_format($hd->phikhac)?></td>
                                        <td>{{$hd->thue}}</td>
                                        <td><?php echo number_format($hd->tongtien)?></td>
                                        <td>{{$hd->ghichu}}</td>
                                        <td><?php echo ($hd->trangthai == 0) ? "Chưa thanh toán" : "Đã thanh toán"  ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen')}}"><i class="fas fa-solid fa-eye text-dark-pastel-green"></i>Xem</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End Here -->
@endsection

@section('footer')
    <!-- jquery-->
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/js/plugins.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('public/js/jquery.counterup.min.js') }}"></script>
    <!-- Moment Js -->
    <script src="{{ asset('public/js/moment.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('public/js/jquery.waypoints.min.js') }}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('public/js/fullcalendar.min.js') }}"></script>

    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('public/js/Chart.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>

    <script type="text/javascript">
        //table
        if ($.fn.DataTable !== undefined) {
            $('#hoadon').DataTable({
                destroy: true,
                paging: false,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
            });
        }
    </script>

<script type="text/javascript">
        if ($("#mychart").length) {

            var barChartData = {
                labels: {!! json_encode($labels)!!},
                datasets: [{
                    backgroundColor: ["#40dfcd", "#417dfc", "#ffaa01","#40dfcd", "#417dfc", "#ffaa01", "#40dfcd", "#417dfc", "#ffaa01","#40dfcd", "#417dfc", "#ffaa01"],
                    data: {!! json_encode($data)!!},
                    label: "Số lượng"
                }, ]
            };
            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000
                },
                scales: {

                    xAxes: [{
                        display: true,
                        maxBarThickness: 100,
                        ticks: {
                            display: true,
                            padding: 0,
                            fontColor: "#646464",
                            fontSize: 14,
                        },
                        gridLines: {
                            display: false,
                            color: '#e1e1e1',
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            display: true,
                            autoSkip: false,
                            fontColor: "#646464",
                            fontSize: 14,
                            stepSize: 2,
                            padding: 20,
                            beginAtZero: true,
                            callback: function (value) {
                                var ranges = [{
                                    divider: 1e6,
                                    suffix: 'M'
                                },
                                    {
                                        divider: 1e3,
                                        suffix: 'k'
                                    }
                                ];

                                function formatNumber(n) {
                                    for (var i = 0; i < ranges.length; i++) {
                                        if (n >= ranges[i].divider) {
                                            return (n / ranges[i].divider).toString() + ranges[i].suffix;
                                        }
                                    }
                                    return n;
                                }
                                return formatNumber(value);
                            }
                        },
                        gridLines: {
                            display: true,
                            drawBorder: true,
                            color: '#e1e1e1',
                            zeroLineColor: '#e1e1e1'

                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true
                },
                elements: {}
            };
            var expenseCanvas = $("#mychart").get(0).getContext("2d");
            var expenseChart = new Chart(expenseCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#namT').on('change', function () {
                var nam = this.value;

                var labels = new Array();
                var data = new Array();

                $.ajax({
                    url: '{{ route('getNam') }}?nam='+nam,
                    type: 'get',
                    success: function (res) {
                        $.each(res, function (key, value) {
                            labels.push(key);
                            data.push(value);
                        });
                        if (labels == '' || data == ''){
                            alert('Không có dữ liệu!!')
                        }else {
                            var barChartData = {
                                labels: labels,
                                datasets: [{
                                    backgroundColor: ["#40dfcd", "#417dfc", "#ffaa01","#40dfcd", "#417dfc", "#ffaa01", "#40dfcd", "#417dfc", "#ffaa01","#40dfcd", "#417dfc", "#ffaa01"],
                                    data: data,
                                    label: "Số lượng"
                                }, ]
                            };
                            var barChartOptions = {
                                responsive: true,
                                maintainAspectRatio: false,
                                animation: {
                                    duration: 2000
                                },
                                scales: {

                                    xAxes: [{
                                        display: true,
                                        maxBarThickness: 100,
                                        ticks: {
                                            display: true,
                                            padding: 0,
                                            fontColor: "#646464",
                                            fontSize: 14,
                                        },
                                        gridLines: {
                                            display: false,
                                            color: '#e1e1e1',
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        ticks: {
                                            display: true,
                                            autoSkip: false,
                                            fontColor: "#646464",
                                            fontSize: 14,
                                            stepSize: 2,
                                            padding: 20,
                                            beginAtZero: true,
                                            callback: function (value) {
                                                var ranges = [{
                                                    divider: 1e6,
                                                    suffix: 'M'
                                                },
                                                    {
                                                        divider: 1e3,
                                                        suffix: 'k'
                                                    }
                                                ];

                                                function formatNumber(n) {
                                                    for (var i = 0; i < ranges.length; i++) {
                                                        if (n >= ranges[i].divider) {
                                                            return (n / ranges[i].divider).toString() + ranges[i].suffix;
                                                        }
                                                    }
                                                    return n;
                                                }
                                                return formatNumber(value);
                                            }
                                        },
                                        gridLines: {
                                            display: true,
                                            drawBorder: true,
                                            color: '#e1e1e1',
                                            zeroLineColor: '#e1e1e1'
                                        }
                                    }]
                                },
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    enabled: true
                                },
                                elements: {}
                            };
                            var expenseCanvas = $("#mychart").get(0).getContext("2d");
                            var expenseChart = new Chart(expenseCanvas, {
                                type: 'bar',
                                data: barChartData,
                                options: barChartOptions
                            });
                        }

                    }
                });

            });
        });
    </script>

    <script type="text/javascript">
        if ($("#line-chart").length) {

            var lineChartData = {
                labels: {!! json_encode($labels_thu)!!},
                datasets: [{
                    data: {!! json_encode($data_thu)!!},
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
                    borderWidth: 3,
                    pointRadius: 0,
                    pointBackgroundColor: '#ff0000',
                    pointBorderColor: '#ffffff',
                    pointHoverRadius: 6,
                    pointHoverBorderWidth: 3,
                    fill: false,
                    label: "Tổng (triệu đồng)"
                }
                ]
            };
            var lineChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000
                },
                scales: {

                    xAxes: [{
                        display: true,
                        ticks: {
                            display: true,
                            fontColor: "#222222",
                            fontSize: 16,
                            padding: 20
                        },
                        gridLines: {
                            display: true,
                            drawBorder: true,
                            color: '#cccccc',
                            borderDash: [5, 5]
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            display: true,
                            autoSkip: true,
                            maxRotation: 0,
                            fontColor: "#646464",
                            fontSize: 16,
                            stepSize: 1000000,
                            padding: 20,
                            callback: function (value) {
                                var ranges = [{
                                    divider: 1e6,
                                    suffix: 'M'
                                },
                                    {
                                        divider: 1e3,
                                        suffix: 'k'
                                    }
                                ];

                                function formatNumber(n) {
                                    for (var i = 0; i < ranges.length; i++) {
                                        if (n >= ranges[i].divider) {
                                            return (n / ranges[i].divider).toString() + ranges[i].suffix;
                                        }
                                    }
                                    return n;
                                }
                                return formatNumber(value);
                            }
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color: '#cccccc',
                            borderDash: [5, 5],
                            zeroLineBorderDash: [5, 5],
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    enabled: true
                },
                elements: {
                    line: {
                        tension: .2
                    },
                    point: {
                        pointStyle: 'circle'
                    }
                }
            };
            var earningCanvas = $("#line-chart").get(0).getContext("2d");
            var earningChart = new Chart(earningCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            });
        }
    </script>
@endsection

@extends('index')

@section('title')
    <title>NESOL | Hóa đơn</title>
@endsection

@section('header')
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/datepicker.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('public/js/modernizr-3.6.0.min.js') }}"></script>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Danh sách hóa đơn</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                <a href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/them')}}" class="btn fw-btn-fill btn-gradient-yellow text-white">Thêm</a>
                            </div>
                            <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                <a href="#" class="btn fw-btn-fill btn-gradient-yellow text-white" id="btn_hoadon">Tải xuống</a>
                            </div>
                            <div class="col-6-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            </div>
                            <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ..." class="form-control" id="hoadon-search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="hoadon-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày hoàn thành</th>
                                <th>Phí thuê xe</th>
                                <th>Phí phát nâng</th>
                                <th>Phí hạ</th>
                                <th>Phí xếp dỡ</th>
                                <th>Phí giấy tờ</th>
                                <th>Phí lưu ca</th>
                                <th>Phí handing</th>
                                <th>Phí khác</th>
                                <th>Thuế GTGT</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Người cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($hoadon as $key => $hd)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$hd->hoadon_id}}</td>
                                <td>{{$hd->ten_kh}}</td>
                                <td>{{$hd->donhang_id}}</td>
                                <td>{{ \Carbon\Carbon::parse($hd->ngayketthuc)->format('d/m/Y') }}</td>
                                <td><?php echo number_format($hd->phithuexe)?></td>
                                <td><?php echo number_format($hd->phinang)?></td>
                                <td><?php echo number_format($hd->phiha)?></td>
                                <td><?php echo number_format($hd->phixepdo)?></td>
                                <td><?php echo number_format($hd->phigiayto)?></td>
                                <td><?php echo number_format($hd->philuuca)?></td>
                                <td><?php echo number_format($hd->handing)?></td>
                                <td><?php echo number_format($hd->phikhac)?></td>
                                <td>{{$hd->thue}}</td>
                                <td><?php echo number_format($hd->tongtien)?></td>
                                <td>{{$hd->ghichu}}</td>
                                @if($hd->trangthai == 0)
                                    <td class="text-center">
                                        <a class="btn btn-danger text-uppercase" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/active/'.$hd->hoadon_id)}}">Chưa thanh toán</a>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <a class="btn btn-success text-uppercase" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/inactive/'.$hd->hoadon_id)}}">Đã thanh toán</a>
                                    </td>
                                @endif
                                <td>{{ \Carbon\Carbon::parse($hd->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($hd->updated_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{$hd->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Bạn có chắc muốn xoá?')" class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/xoa/'.$hd->hoadon_id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/sua/'.$hd->hoadon_id)}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
                                        </div>
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
    <!-- Select 2 Js -->
    <script src="{{ asset('public/js/select2.min.js') }}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Data Table Js -->
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <!-- Date Picker Js -->
    <script src="{{ asset('public/js/datepicker.min.js') }}"></script>

    <script src="{{ asset('public/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/js/jszip.min.js') }}"></script>
    <script src="{{ asset('public/js/buttons.html5.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>

    <script>
        if ($.fn.DataTable !== undefined) {
            oTable = $('#hoadon-table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Hóa đơn vận chuyển',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_hoadon").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#hoadon-search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

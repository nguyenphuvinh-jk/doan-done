@extends('index')

@section('title')
    <title>NESOL | Cấp phát nhiên liệu</title>
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
                            <h3>Danh sách chi phí</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-1-xxxl col-xl-1 col-lg-2 col-md-2 col-12 form-group">
                                <a href="{{URL::to('/quan-ly-xe/cap-phat-nhien-lieu/them')}}" class="btn fw-btn-fill btn-gradient-yellow text-white">Thêm</a>
                            </div>
                            <div class="col-1-xxxl col-xl-1 col-lg-2 col-md-2 col-12 form-group">
                                <a href="#" class="btn fw-btn-fill btn-gradient-yellow text-white" id="btn_phatsinhxe">Tải xuống</a>
                            </div>
                            <div class="col-6-xxxl col-xl-5 col-lg-2 col-md-2 col-12 form-group">
                            </div>
                            <div class="col-4-xxxl col-xl-5 col-lg-6 col-md-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="phatsinhxe_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="phatsinhxe_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Mã xe</th>
                                <th>Biển số xe</th>
                                <th>Loại xe</th>
                                <th>Số km đầu</th>
                                <th>Số km cuối</th>
                                <th>Ngày</th>
                                <th>Cây xăng</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Người cập nhật</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($phatsinhxe as $key => $phatsinh)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$phatsinh->phatsinhxe_id}}</td>
                                <td>{{$phatsinh->xe_id}}</td>
                                <td>{{$phatsinh->biensoxe}}</td>
                                <td>{{$phatsinh->ten_loaixe}}</td>
                                <td><?php echo number_format($phatsinh->km_batdau) ?></td>
                                <td><?php echo number_format($phatsinh->km_cuoi) ?></td>
                                <td>{{ \Carbon\Carbon::parse($phatsinh->ngay)->format('d/m/Y') }}</td>
                                <td>{{$phatsinh->cayxang}}</td>
                                <td><?php echo number_format($phatsinh->soluong) ?></td>
                                <td><?php echo number_format($phatsinh->dongia) ?></td>
                                <td>{{$phatsinh->thanhtien}}</td>
                                <td>{{$phatsinh->ghichu}}</td>
                                <td>{{ \Carbon\Carbon::parse($phatsinh->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($phatsinh->updated_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{$phatsinh->name}}</td>
                                <td class="noExl">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-xe/cap-phat-nhien-lieu/xoa/'.$phatsinh->phatsinhxe_id)}}"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-xe/cap-phat-nhien-lieu/sua/'.$phatsinh->phatsinhxe_id)}}"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
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
            oTable = $('#phatsinhxe_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Danh sách sửa chữa',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_phatsinhxe").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#phatsinhxe_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

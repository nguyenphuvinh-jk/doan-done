@extends('index')

@section('title')
    <title>NESOL | Khoảng cách ước tính</title>
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

@section('menu')
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item">
                <a href="{{URL::to('/trang-chu')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Tổng quan</span></a>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Quản lý danh mục</span></a>
                <ul class="nav sub-group-menu sub-group-active">
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh')}}" class="nav-link menu-active"><i class="fas fa-angle-right"></i>Khoảng cách ước tính</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-danh-muc/hang-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Hãng xe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-danh-muc/trong-tai-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Trọng tải xe</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Quản lý khách hàng</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-khach-hang/khach-hang')}}" class="nav-link"><i class="fas fa-angle-right"></i>Thông tin khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen')}}" class="nav-link"><i class="fas fa-angle-right"></i>Hợp đồng vận chuyển</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-calendar"></i><span>Quản lý vận chuyển</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-van-chuyen/gia-cuoc-van-chuyen')}}" class="nav-link"><i class="fas fa-angle-right"></i>Giá cước vận chuyển</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-van-chuyen/don-hang')}}" class="nav-link"><i class="fas fa-angle-right"></i>Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Phiếu điều xe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-van-chuyen/chi-phi-phat-sinh')}}" class="nav-link"><i class="fas fa-angle-right"></i>Chi phí phát sinh</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen')}}" class="nav-link"><i class="fas fa-angle-right"></i>Hóa đơn vận chuyển</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-bus-side-view"></i><span>Quản lý xe</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-xe/thong-tin-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Thông tin xe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-xe/giay-to-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Giấy tờ xe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-xe/sua-chua/bao-duong')}}" class="nav-link"><i class="fas fa-angle-right"></i>Sửa chữa/bảo dưỡng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-xe/phi-phat-sinh')}}" class="nav-link"><i class="fas fa-angle-right"></i>Chi phí phát sinh</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Quản lý tài xế</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-tai-xe/thong-tin-tai-xe')}}" class="nav-link"><i class="fas fa-angle-right"></i>Thông tin tài xế</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-tai-xe/bang-lai')}}" class="nav-link"><i class="fas fa-angle-right"></i>Bằng lái xe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL::to('/quan-ly-tai-xe/tinh-luong')}}" class="nav-link"><i class="fas fa-angle-right"></i>Tính lương</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{URL::to('/tai-khoan')}}" class="nav-link"><i
                        class="flaticon-user"></i><span>Tài khoản</span></a>
            </li>
        </ul>
    </div>
@endsection

@section('contents')
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                    @if(isset($khoangcach_edit))
                        @foreach($khoangcach_edit as $key => $kc_edit)
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Sửa khoảng cách</h3>
                                    @include('components.errors')
                                </div>
                            </div>
                            <form class="new-added-form" action="{{URL::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh/capnhat/'.$kc_edit->khoangcach_id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                        <label>Khoảng cách</label>
                                        <input type="text" placeholder="" class="form-control" value="{{$kc_edit->khoangcach}}" name="khoangcach">
                                    </div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    @else
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Thêm khoảng cách</h3>
                                    @include('components.errors')
                                </div>
                            </div>
                            <form class="new-added-form" action="{{URL::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh/luu')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                        <label>Khoảng cách</label>
                                        <input type="text" placeholder="" class="form-control" name="khoangcach">
                                        @if ($errors->has('khoangcach'))
                                            <p class="text-danger font-italic">{{ $errors->first('khoangcach') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
            </div>
        </div>
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Danh sách khoảng cách</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="khoangcach_table">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Khoảng cách</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($khoangcach as $key => $kc)
                            <tr>
                                <td>{{$kc->khoangcach_id}}</td>
                                <td>{{$kc->khoangcach}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh/xoa/'.$kc->khoangcach_id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a type="submit" class="dropdown-item" href="{{URL::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh/sua/'.$kc->khoangcach_id)}}"><i class="fas fa-times text-orange-red"></i>Sửa</a>
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
            $('#khoangcach_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false
                }],
            });
        }
    </script>
@endsection

@extends('index')

@section('title')
    <title>NESOL | Sửa đơn hàng</title>
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
    <div class="card height-auto">
        <div class="card-body">
            @foreach($donhang_edit as $key => $dh_edit)
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Thêm đơn hàng</h3>
                    @include('components.errors')
                </div>
            </div>
            <form class="new-added-form" action="{{URL::to('/quan-ly-van-chuyen/don-hang/sua/capnhat/'.$dh_edit->dh_id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>ID</label>
                        <input type="text" placeholder="" class="form-control" name="dh_id" value="{{$dh_edit->dh_id}}" disabled>
                        @if ($errors->has('dh_id'))
                            <p class="text-danger font-italic">{{ $errors->first('dh_id') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Đơn vị</label>
                        <select class="select2" name="donvi">
                            <option value="">Chọn khách hàng</option>
                            @foreach($khachhang as $key => $kh)
                                <option value="{{$kh->kh_id}}" {{$dh_edit->donvi == $kh->kh_id? 'selected': ''}}>{{$kh->ten_kh}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('donvi'))
                            <p class="text-danger font-italic">{{ $errors->first('donvi') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ngày đặt hàng</label>
                        <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right" name="ngaydat" value="{{ \Carbon\Carbon::parse($dh_edit->ngaydat)->format('d/m/Y') }}">
                        <i class="far fa-calendar-alt"></i>
                        @if ($errors->has('ngaydat'))
                            <p class="text-danger font-italic">{{ $errors->first('ngaydat') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mặt hàng</label>
                        <select class="select2" name="mathang">
                            <option value="">Chọn loại hàng</option>
                            @foreach($loaihang as $key => $lh)
                                <option value="{{$lh->loaihang_id}}" {{$dh_edit->mathang == $lh->loaihang_id? 'selected': ''}}>{{$lh->ten_loaihang}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('mathang'))
                            <p class="text-danger font-italic">{{ $errors->first('mathang') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Trọng lượng</label>
                        <input type="text" placeholder="" class="form-control" name="trongluong" value="{{$dh_edit->trongluong}}">
                        @if ($errors->has('trongluong'))
                            <p class="text-danger font-italic">{{ $errors->first('trongluong') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Đơn vị tính</label>
                        <select class="select2" name="donvitinh">
                            <option value="">Chọn dvt </option>
                            @foreach($dvt as $key => $kc)
                                <option value="{{$kc->dvt_id}}" {{$dh_edit->donvitinh == $kc->dvt_id? 'selected': ''}}>{{$kc->ten_dvt}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('donvitinh'))
                            <p class="text-danger font-italic">{{ $errors->first('donvitinh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Tuyến đường</label>
                        <select class="select2" name="tuyenduong">
                            <option value="">Chọn tuyến đường</option>
                            @foreach($tuyenduong as $key => $td)
                                <option value="{{$td->tuyenduong_id}}" {{$dh_edit->tuyenduong == $td->tuyenduong_id ? 'selected': ''}}>{{$td->ten_tuyenduong}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tuyenduong'))
                            <p class="text-danger font-italic">{{ $errors->first('tuyenduong') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Đại điểm lấy hàng</label>
                        <input type="text" placeholder="" class="form-control" name="dd_layhang" value="{{$dh_edit->dd_layhang}}">
                        @if ($errors->has('dd_layhang'))
                            <p class="text-danger font-italic">{{ $errors->first('dd_layhang') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Địa điểm giao hàng</label>
                        <input type="text" placeholder="" class="form-control" name="dd_giaohang" value="{{$dh_edit->dd_giaohang}}">
                        @if ($errors->has('dd_giaohang'))
                            <p class="text-danger font-italic">{{ $errors->first('dd_giaohang') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Thời gian bắt đầu</label>
                        <input type="text" placeholder="" class="form-control" name="tg_batdau" value="{{$dh_edit->tg_batdau}}">
                        @if ($errors->has('tg_batdau'))
                            <p class="text-danger font-italic">{{ $errors->first('tg_batdau') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ngày vận chuyển</label>
                        <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right" name="ngaybatdau" value="{{ \Carbon\Carbon::parse($dh_edit->ngaybatdau)->format('d/m/Y') }}">
                        <i class="far fa-calendar-alt"></i>
                        @if ($errors->has('ngaybatdau'))
                            <p class="text-danger font-italic">{{ $errors->first('ngaybatdau') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ngày hoàn thành</label>
                        <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right" name="ngayketthuc" value="{{ \Carbon\Carbon::parse($dh_edit->ngayketthuc)->format('d/m/Y') }}">
                        <i class="far fa-calendar-alt"></i>
                        @if ($errors->has('ngayketthuc'))
                            <p class="text-danger font-italic">{{ $errors->first('ngayketthuc') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số giờ lưu ca</label>
                        <input type="text" placeholder="" class="form-control" name="gioluuca" value="{{$dh_edit->sogioluuca}}">
                        @if ($errors->has('gioluuca'))
                            <p class="text-danger font-italic">{{ $errors->first('gioluuca') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Trạng thái</label>
                        <select class="select2" name="trangthai_dh">
                            <option value="">Chọn trạng thái</option>
                            <option value="0" {{$dh_edit->trangthai_dh == 0 ? 'selected': ''}}>Chờ điều xe</option>
                            <option value="1" {{$dh_edit->trangthai_dh == 1 ? 'selected': ''}}>Đã điều xe</option>
                        </select>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <input type="hidden" placeholder="" class="form-control" name="nguoitao_dh" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    @endif
                    <div class="col-md-9 form-group"></div>
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                    </div>
                </div>
            </form>
            @endforeach
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
            oTable = $('#donhang_table').DataTable({
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
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Đơn hàng vận chuyển',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_donhang").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#donhang_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

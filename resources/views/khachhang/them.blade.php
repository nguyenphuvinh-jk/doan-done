@extends('index')

@section('title')
    <title>NESOL | Thêm khách hàng </title>
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
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Thêm khách hàng</h3>
                    @include('components.errors')
                </div>
            </div>
            <form class="new-added-form" action="{{ URL::to('/quan-ly-khach-hang/khach-hang/them/luu') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Tên khách hàng </label>
                        <input type="text" placeholder="" class="form-control" name="ten_kh" value="{{old('ten_kh')}}">
                        @if ($errors->has('ten_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('ten_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số điện thoại </label>
                        <input type="text" placeholder="" class="form-control" name="sdt_kh" value="{{old('sdt_kh')}}">
                        @if ($errors->has('sdt_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('sdt_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Địa chỉ </label>
                        <input type="text" placeholder="" class="form-control" name="diachi_kh" value="{{old('diachi_kh')}}">
                        @if ($errors->has('diachi_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('diachi_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mã số thuế</label>
                        <input type="text" placeholder="" class="form-control" name="masothue_kh" value="{{old('masothue_kh')}}">
                        @if ($errors->has('masothue_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('masothue_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Fax </label>
                        <input type="text" placeholder="" class="form-control" name="fax_kh" value="{{old('fax_kh')}}">
                        @if ($errors->has('fax_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('fax_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số tài khoản </label>
                        <input type="text" placeholder="" class="form-control" name="sotk_kh" value="{{old('sotk_kh')}}">
                        @if ($errors->has('sotk_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('sotk_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Tên ngân hàng</label>
                        <input type="text" placeholder="" class="form-control" name="ten_nganhang" value="{{old('ten_nganhang')}}">
                        @if ($errors->has('ten_nganhang'))
                            <p class="text-danger font-italic">{{ $errors->first('ten_nganhang') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Người đại diện</label>
                        <input type="text" placeholder="" class="form-control" name="nguoidaidien_kh" value="{{old('nguoidaidien_kh')}}">
                        @if ($errors->has('nguoidaidien_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('nguoidaidien_kh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Chức vụ</label>
                        <input type="text" placeholder="" class="form-control" name="chucvu_kh" value="{{old('chucvu_kh')}}">
                        @if ($errors->has('chucvu_kh'))
                            <p class="text-danger font-italic">{{ $errors->first('chucvu_kh') }}</p>
                        @endif
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>

                    </div>
                </div>
            </form>
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
            oTable = $('#khachhang_table').DataTable({
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
                    title: 'Khách hàng',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_khachhang").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#khachhang_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

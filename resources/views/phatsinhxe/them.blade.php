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
        <div class="col-12-xxxl col-md-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Thêm thông tin</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="new-added-form" action="{{URL::to('/quan-ly-xe/cap-phat-nhien-lieu/them/luu')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Biển số xe</label>
                                <select class="select2" name="xe_id">
                                    <option value="">Chọn biển số</option>
                                    @foreach($xe as $key => $xe)
                                        <option value="{{$xe->xe_id}}">{{$xe->biensoxe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('xe_id'))
                                    <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Số km đầu</label>
                                <input type="text" placeholder="" class="form-control" name="km_batdau" value="{{old('km_batdau')}}">
                                @if ($errors->has('km_batdau'))
                                    <p class="text-danger font-italic">{{ $errors->first('km_batdau') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Số km cuối</label>
                                <input type="text" placeholder="" class="form-control" name="km_cuoi" value="{{old('km_cuoi')}}">
                                @if ($errors->has('km_cuoi'))
                                    <p class="text-danger font-italic">{{ $errors->first('km_cuoi') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ngày</label>
                                <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngay" value="{{old('ngay')}}">
                                <i class="far fa-calendar-alt"></i>
                                @if ($errors->has('ngay'))
                                    <p class="text-danger font-italic">{{ $errors->first('ngay') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Cây xăng</label>
                                <input type="text" placeholder="" class="form-control" name="cayxang" value="{{old('cayxang')}}">
                                @if ($errors->has('cayxang'))
                                    <p class="text-danger font-italic">{{ $errors->first('cayxang') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Số lượng đổ</label>
                                <input type="text" placeholder="" class="form-control" name="soluong" value="{{old('soluong')}}">
                                @if ($errors->has('soluong'))
                                    <p class="text-danger font-italic">{{ $errors->first('soluong') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Đơn giá</label>
                                <input type="text" placeholder="" class="form-control" name="dongia" value="{{old('dongia')}}">
                                @if ($errors->has('dongia'))
                                    <p class="text-danger font-italic">{{ $errors->first('dongia') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Tổng tiền</label>
                                <input type="text" placeholder="" class="form-control" name="thanhtien" value="{{old('thanhtien')}}">
                                @if ($errors->has('thanhtien'))
                                    <p class="text-danger font-italic">{{ $errors->first('thanhtien') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ghi chú </label>
                                <input type="text" placeholder="" class="form-control" name="ghichu" value="{{old('ghichu')}}">
                                @if ($errors->has('ghichu'))
                                    <p class="text-danger font-italic">{{ $errors->first('ghichu') }}</p>
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <input type="hidden" placeholder="" class="form-control" name="nguoixacnhan" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            @endif
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                            </div>
                        </div>
                    </form>
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

@endsection

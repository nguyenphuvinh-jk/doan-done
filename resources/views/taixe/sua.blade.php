@extends('index')

@section('title')
    <title>NESOL | Sửa thông tin lái xe</title>
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
            @foreach($taixe_edit as $key => $tx_edit)
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Sửa lái xe</h3>
                    @include('components.errors')
                </div>
            </div>
            <form class="new-added-form" action="{{ URL::to('/quan-ly-tai-xe/thong-tin-tai-xe/sua/capnhat/'.$tx_edit->taixe_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mã lái xe</label>
                        <input type="text" placeholder="" class="form-control" name="taixe_id" value="{{$tx_edit->taixe_id}}" disabled>
                        @if ($errors->has('taixe_id'))
                            <p class="text-danger font-italic">{{ $errors->first('taixe_id') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Tên</label>
                        <input type="text" placeholder="" class="form-control" name="ten_taixe" value="{{$tx_edit->ten_taixe}}">
                        @if ($errors->has('ten_taixe'))
                            <p class="text-danger font-italic">{{ $errors->first('ten_taixe') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Ngày sinh</label>
                        <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaysinh" value="{{ \Carbon\Carbon::parse($tx_edit->ngaysinh)->format('d/m/Y') }}">
                        <i class="far fa-calendar-alt"></i>
                        @if ($errors->has('ngaysinh'))
                            <p class="text-danger font-italic">{{ $errors->first('ngaysinh') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số điện thoại</label>
                        <input type="text" placeholder="" class="form-control" name="sdt" value="{{$tx_edit->sdt}}">
                        @if ($errors->has('sdt'))
                            <p class="text-danger font-italic">{{ $errors->first('sdt') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Địa chỉ</label>
                        <input type="text" placeholder="" class="form-control" name="diachi" value="{{$tx_edit->diachi}}">
                        @if ($errors->has('diachi'))
                            <p class="text-danger font-italic">{{ $errors->first('diachi') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số CCCD</label>
                        <input type="text" placeholder="" class="form-control" name="CCCD" value="{{$tx_edit->CCCD}}">
                        @if ($errors->has('CCCD'))
                            <p class="text-danger font-italic">{{ $errors->first('CCCD') }}</p>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Số tài khoản ngân hàng</label>
                        <input type="text" placeholder="" class="form-control" name="tknh" value="{{$tx_edit->tknh}}">
                        @if ($errors->has('tknh'))
                            <p class="text-danger font-italic">{{ $errors->first('tknh') }}</p>
                        @endif
                    </div>
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

@endsection

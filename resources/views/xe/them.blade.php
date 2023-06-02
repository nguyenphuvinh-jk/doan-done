@extends('index')

@section('title')
    <title>NESOL | Thêm thông tin xe</title>
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
                            <h3>Thêm thông tin xe</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="new-added-form" action="{{ URL::to('/quan-ly-xe/thong-tin-xe/them/luu') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Hãng xe</label>
                                <select class="select2" name="hangxe">
                                    <option value="">Chọn hãng xe</option>
                                    @foreach($hangxe as $key => $hx)
                                        <option value="{{$hx->hangxe_id}}">{{$hx->ten_hangxe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('hangxe'))
                                    <p class="text-danger font-italic">{{ $errors->first('hangxe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Loại xe</label>
                                <select class="select2" name="loaixe">
                                    <option value="">Chọn loại xe</option>
                                    @foreach($loaixe as $key => $loaixe)
                                        <option value="{{$loaixe->loaixe_id}}">{{$loaixe->ten_loaixe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('loaixe'))
                                    <p class="text-danger font-italic">{{ $errors->first('loaixe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Biển số xe</label>
                                <input type="text" placeholder="" class="form-control" name="biensoxe" value="{{old('biensoxe')}}">
                                @if ($errors->has('biensoxe'))
                                    <p class="text-danger font-italic">{{ $errors->first('biensoxe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Màu sơn</label>
                                <input type="text" placeholder="" class="form-control" name="mauson" value="{{old('mauson')}}">
                                @if ($errors->has('mauson'))
                                    <p class="text-danger font-italic">{{ $errors->first('mauson') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Năm sản xuất</label>
                                <input type="text" placeholder="" class="form-control" name="namsx" value="{{old('namsx')}}">
                                @if ($errors->has('namsx'))
                                    <p class="text-danger font-italic">{{ $errors->first('namsx') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ngày mua</label>
                                <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaymua" value="{{old('ngaymua')}}">
                                <i class="far fa-calendar-alt"></i>
                                @if ($errors->has('ngaymua'))
                                    <p class="text-danger font-italic">{{ $errors->first('ngaymua') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Nơi mua</label>
                                <input type="text" placeholder="" class="form-control" name="noimua" value="{{old('noimua')}}">
                                @if ($errors->has('noimua'))
                                    <p class="text-danger font-italic">{{ $errors->first('noimua') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ngày bán</label>
                                <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayban" value="{{old('ngayban')}}">
                                <i class="far fa-calendar-alt"></i>
                                @if ($errors->has('ngayban'))
                                    <p class="text-danger font-italic">{{ $errors->first('ngayban') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Nơi bán</label>
                                <input type="text" placeholder="" class="form-control" name="noiban" value="{{old('noiban')}}">
                                @if ($errors->has('noiban'))
                                    <p class="text-danger font-italic">{{ $errors->first('noiban') }}</p>
                                @endif
                            </div>
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

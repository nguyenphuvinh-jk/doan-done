@extends('index')

@section('title')
    <title>NESOL | Sửa thông tin xe</title>
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
                    @foreach($xe_edit as $key => $xe_edit)
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Sửa thông tin xe</h3>
                        </div>
                    </div>
                    <form class="new-added-form text-dark" action="{{ URL::to('/quan-ly-xe/thong-tin-xe/sua/capnhat/'.$xe_edit->xe_id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Loại xe</label>
                                <select class="select2" name="loaixe">
                                    <option value="">Chọn loại xe</option>
                                    @foreach($loaixe as $key => $loai_xe)
                                        <option value="{{$loai_xe->loaixe_id}}" {{$xe_edit->loaixe == $loai_xe->loaixe_id? 'selected': ''}}>{{$loai_xe->ten_loaixe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('loaixe'))
                                    <p class="text-danger font-italic">{{ $errors->first('loaixe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Hãng xe</label>
                                <select class="select2" name="hangxe">
                                    <option value="">Chọn hãng xe</option>
                                    @foreach($hangxe as $key => $hx)
                                        <option value="{{$hx->hangxe_id}}" {{$xe_edit->hangxe == $hx->hangxe_id? 'selected': ''}}>{{$hx->ten_hangxe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('hangxe'))
                                    <p class="text-danger font-italic">{{ $errors->first('hangxe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Biển số xe</label>
                                <input type="text" placeholder="" class="form-control" name="biensoxe" value="{{$xe_edit->biensoxe}}">
                                @if ($errors->has('biensoxe'))
                                    <p class="text-danger font-italic">{{ $errors->first('biensoxe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Màu sơn</label>
                                <input type="text" placeholder="" class="form-control" name="mauson" value="{{$xe_edit->mauson}}">
                                @if ($errors->has('mauson'))
                                    <p class="text-danger font-italic">{{ $errors->first('mauson') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Năm sản xuất</label>
                                <input type="text" placeholder="" class="form-control" name="namsx" value="{{$xe_edit->namsx}}">
                                @if ($errors->has('namsx'))
                                    <p class="text-danger font-italic">{{ $errors->first('namsx') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ngày mua</label>
                                @if($xe_edit->ngaymua)
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaymua" value="{{ \Carbon\Carbon::parse($xe_edit->ngaymua)->format('d/m/Y') }}">
                                @else
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaymua">
                                @endif
                                <i class="far fa-calendar-alt"></i>
                                @if ($errors->has('ngaymua'))
                                    <p class="text-danger font-italic">{{ $errors->first('ngaymua') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Nơi mua</label>
                                <input type="text" placeholder="" class="form-control" name="noimua" value="{{$xe_edit->noimua}}">
                                @if ($errors->has('noimua'))
                                    <p class="text-danger font-italic">{{ $errors->first('noimua') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ngày bán</label>
                                @if($xe_edit->ngayban)
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayban" value="{{ \Carbon\Carbon::parse($xe_edit->ngayban)->format('d/m/Y') }}">
                                @else
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayban">
                                @endif
                                <i class="far fa-calendar-alt"></i>
                                @if ($errors->has('ngayban'))
                                    <p class="text-danger font-italic">{{ $errors->first('ngayban') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Nơi bán</label>
                                <input type="text" placeholder="" class="form-control" name="noiban" value="{{$xe_edit->noiban}}">
                                @if ($errors->has('noiban'))
                                    <p class="text-danger font-italic">{{ $errors->first('noiban') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Trạng thái</label>
                                <select class="select2" name="trangthai">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="0" {{$xe_edit->trangthai == 0? 'selected': ''}}>Sẵn sàng</option>
                                    <option value="1" {{$xe_edit->trangthai == 1? 'selected': ''}}>Sửa chữa</option>
                                </select>
                                @if ($errors->has('trangthai'))
                                    <p class="text-danger font-italic">{{ $errors->first('trangthai') }}</p>
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

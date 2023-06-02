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
                    @foreach($hoadon_edit as $key => $hd_edit)
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Thêm hóa đơn</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="new-added-form" action="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/sua/capnhat/'.$hd_edit->hoadon_id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-3-xxxl col-lg-6 col-12 form-group">
                                <label>Mã đơn hàng</label>
                                <select class="select2" name="donhang_id">
                                    <option value="">Chọn mã đơn</option>
                                    @foreach($donhang as $key => $dh)
                                        <option value="{{$dh->dh_id}}" {{$hd_edit->donhang_id == $dh->dh_id? 'selected': ''}}>{{$dh->dh_id}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('donhang_id'))
                                    <p class="text-danger font-italic">{{ $errors->first('donhang_id') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí thuê xe</label>
                                <input type="text" placeholder="" class="form-control" name="phithuexe" value="{{$hd_edit->phithuexe}}">
                                @if ($errors->has('phithuexe'))
                                    <p class="text-danger font-italic">{{ $errors->first('phithuexe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí nâng</label>
                                <input type="text" placeholder="" class="form-control" name="phinang" value="{{$hd_edit->phinang}}">
                                @if ($errors->has('phinang'))
                                    <p class="text-danger font-italic">{{ $errors->first('phinang') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí hạ</label>
                                <input type="text" placeholder="" class="form-control" name="phiha" value="{{$hd_edit->phiha}}">
                                @if ($errors->has('phiha'))
                                    <p class="text-danger font-italic">{{ $errors->first('phiha') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí xếp dỡ</label>
                                <input type="text" placeholder="" class="form-control" name="phixepdo" value="{{$hd_edit->phixepdo}}">
                                @if ($errors->has('phixepdo'))
                                    <p class="text-danger font-italic">{{ $errors->first('phixepdo') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí giấy tờ</label>
                                <input type="text" placeholder="" class="form-control" name="phigiayto" value="{{$hd_edit->phigiayto}}">
                                @if ($errors->has('phigiayto'))
                                    <p class="text-danger font-italic">{{ $errors->first('phigiayto') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí lưu ca</label>
                                <input type="text" placeholder="" class="form-control" name="philuuca" value="{{$hd_edit->philuuca}}">
                                @if ($errors->has('philuuca'))
                                    <p class="text-danger font-italic">{{ $errors->first('philuuca') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí handing</label>
                                <input type="text" placeholder="" class="form-control" name="handing" value="{{$hd_edit->handing}}">
                                @if ($errors->has('handing'))
                                    <p class="text-danger font-italic">{{ $errors->first('handing') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí khác</label>
                                <input type="text" placeholder="" class="form-control" name="phikhac" value="{{$hd_edit->phikhac}}">
                                @if ($errors->has('phikhac'))
                                    <p class="text-danger font-italic">{{ $errors->first('phikhac') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Thuế GTGT</label>
                                <input type="text" placeholder="" class="form-control" name="thue" value="{{$hd_edit->thue}}">
                                @if ($errors->has('thue'))
                                    <p class="text-danger font-italic">{{ $errors->first('thue') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ghi chú</label>
                                <input type="text" placeholder="" class="form-control" name="ghichu" value="{{$hd_edit->ghichu}}">
                                @if ($errors->has('ghichu'))
                                    <p class="text-danger font-italic">{{ $errors->first('ghichu') }}</p>
                                @endif
                            </div>
                            <div class="col-3-xxxl col-lg-6 col-12 form-group">
                                <label>Trạng thái</label>
                                <select class="select2" name="trangthai">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="0" {{$hd_edit->trangthai == 0? 'selected': ''}}>Chưa thanh toán</option>
                                    <option value="1" {{$hd_edit->trangthai == 1? 'selected': ''}}>Đã thanh toán</option>
                                </select>
                                @if ($errors->has('trangthai_hd'))
                                    <p class="text-danger font-italic">{{ $errors->first('trangthai_hd') }}</p>
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <input type="hidden" placeholder="" class="form-control" name="nguoitao_hoadon" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            @endif
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Tạo</button>
                            </div>
                        </div>
                        @endforeach
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
    >
@endsection

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
                            <h3>Thêm hóa đơn</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="new-added-form" action="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/them/luu')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-3-xxxl col-lg-6 col-12 form-group">
                                <label>Mã đơn hàng</label>
                                <select class="select2" name="donhang_id">
                                    <option value="">Chọn mã đơn</option>
                                    @foreach($donhang as $key => $dh)
                                    <option value="{{$dh->dh_id}}">{{$dh->dh_id}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('donhang_id'))
                                    <p class="text-danger font-italic">{{ $errors->first('donhang_id') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí thuê xe</label>
                                <input type="text" placeholder="" class="form-control" name="phithuexe" value="{{old('phithuexe')}}">
                                @if ($errors->has('phithuexe'))
                                    <p class="text-danger font-italic">{{ $errors->first('phithuexe') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí nâng</label>
                                <input type="text" placeholder="" class="form-control" name="phinang" value="{{old('phinang')}}">
                                @if ($errors->has('phinang'))
                                    <p class="text-danger font-italic">{{ $errors->first('phinang') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí hạ</label>
                                <input type="text" placeholder="" class="form-control" name="phiha" value="{{old('phiha')}}">
                                @if ($errors->has('phiha'))
                                    <p class="text-danger font-italic">{{ $errors->first('phiha') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí xếp dỡ</label>
                                <input type="text" placeholder="" class="form-control" name="phixepdo" value="{{old('phixepdo')}}">
                                @if ($errors->has('phixepdo'))
                                    <p class="text-danger font-italic">{{ $errors->first('phixepdo') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí giấy tờ</label>
                                <input type="text" placeholder="" class="form-control" name="phigiayto" value="{{old('phigiayto')}}">
                                @if ($errors->has('phigiayto'))
                                    <p class="text-danger font-italic">{{ $errors->first('phigiayto') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí lưu ca</label>
                                <input type="text" placeholder="" class="form-control" name="philuuca" value="{{old('philuuca')}}">
                                @if ($errors->has('philuuca'))
                                    <p class="text-danger font-italic">{{ $errors->first('philuuca') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí handing</label>
                                <input type="text" placeholder="" class="form-control" name="handing" value="{{old('handing')}}">
                                @if ($errors->has('handing'))
                                    <p class="text-danger font-italic">{{ $errors->first('handing') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Phí khác</label>
                                <input type="text" placeholder="" class="form-control" name="phikhac" value="{{old('phikhac')}}">
                                @if ($errors->has('phikhac'))
                                    <p class="text-danger font-italic">{{ $errors->first('phikhac') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Thuế GTGT</label>
                                <input type="text" placeholder="" class="form-control" name="thue" value="{{old('thue')}}">
                                @if ($errors->has('thue'))
                                    <p class="text-danger font-italic">{{ $errors->first('thue') }}</p>
                                @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Ghi chú</label>
                                <input type="text" placeholder="" class="form-control" name="ghichu" value="{{old('ghichu')}}">
                                @if ($errors->has('ghichu'))
                                    <p class="text-danger font-italic">{{ $errors->first('ghichu') }}</p>
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <input type="hidden" placeholder="" class="form-control" name="nguoitao_hoadon" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            @endif
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Tạo</button>
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

    <script>
        if ($.fn.DataTable !== undefined) {
            oTable = $('#hoadon-table').DataTable({
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

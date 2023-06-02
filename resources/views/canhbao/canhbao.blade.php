@extends('index')

@section('title')
    <title>NESOL | Cảnh báo tài sản</title>
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
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                @if(isset($canhbao_edit))
                    <div class="card-body">
                        @foreach($canhbao_edit as $key => $cb_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa thông tin</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-xe/canh-bao-tai-san/capnhat/'.$cb_edit->canhbao_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày kiểm tra</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngay" value="{{ \Carbon\Carbon::parse($cb_edit->ngay)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngay'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngay') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Biển số xe</label>
                                    <select class="select2" name="xe_id">
                                        <option value="">Chọn biển số</option>
                                        @foreach($xe as $key => $xe)
                                            <option value="{{$xe->xe_id}}" {{$cb_edit->xe_id == $xe->xe_id ? 'selected': ''}}>{{$xe->biensoxe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('xe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Km hiện tại</label>
                                    <input type="text" placeholder="" class="form-control" name="km_hientai" value="{{$cb_edit->km_hientai}}">
                                    @if ($errors->has('km_hientai'))
                                        <p class="text-danger font-italic">{{ $errors->first('km_hientai') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tình trạng</label>
                                    <textarea type="text" placeholder="" class="form-control" name="tinhtrang"><?php echo htmlspecialchars($cb_edit->tinhtrang); ?></textarea>
                                    @if ($errors->has('tinhtrang'))
                                        <p class="text-danger font-italic">{{ $errors->first('tinhtrang') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Đánh giá</label>
                                    <input type="text" placeholder="" class="form-control" name="danhgia" value="{{$cb_edit->danhgia}}">
                                    @if ($errors->has('danhgia'))
                                        <p class="text-danger font-italic">{{ $errors->first('danhgia') }}</p>
                                    @endif
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" placeholder="" class="form-control" name="nguoicanhbao" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                @endif
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                @else
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Thêm thông tin</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-xe/canh-bao-tai-san/luu')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày kiểm tra</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngay" value="{{old('ngay')}}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngay'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngay') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
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
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Km hiện tại</label>
                                    <input type="text" placeholder="" class="form-control" name="km_hientai" value="{{old('km_hientai')}}">
                                    @if ($errors->has('km_hientai'))
                                        <p class="text-danger font-italic">{{ $errors->first('km_hientai') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tình trạng</label>
                                    <textarea type="text" placeholder="" class="form-control" name="tinhtrang">{{old('tinhtrang')}}</textarea>
                                    @if ($errors->has('tinhtrang'))
                                        <p class="text-danger font-italic">{{ $errors->first('tinhtrang') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Đánh giá</label>
                                    <input type="text" placeholder="" class="form-control" name="danhgia" value="{{old('danhgia')}}">
                                    @if ($errors->has('danhgia'))
                                        <p class="text-danger font-italic">{{ $errors->first('danhgia') }}</p>
                                    @endif
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" placeholder="" class="form-control" name="nguoicanhbao" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                @endif
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
                            <h3>Danh sách cảnh báo tài sản</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_canhbao">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="canhbao_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap text-center" id="canhbao_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Ngày kiểm tra</th>
                                <th>Biển số xe</th>
                                <th>Hãng xe</th>
                                <th>Loại xe</th>
                                <th>Năm sản xuất</th>
                                <th>Km hiện tại</th>
                                <th>Tình trạng</th>
                                <th>Đánh giá</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Người cập nhật</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($canhbao as $key => $sua)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sua->canhbao_id}}</td>
                                <td>{{ \Carbon\Carbon::parse($sua->ngay)->format('d/m/Y') }}</td>
                                <td>{{$sua->biensoxe}}</td>
                                <td>{{$sua->ten_hangxe}}</td>
                                <td>{{$sua->ten_loaixe}}</td>
                                <td>{{$sua->namsx}}</td>
                                <td>{{number_format($sua->km_hientai)}}</td>
                                <td class="text-left">{!! nl2br($sua->tinhtrang)!!}</td>
                                <td>{{$sua->danhgia}}</td>
                                <td>{{ \Carbon\Carbon::parse($sua->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($sua->updated_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{$sua->name}}</td>
                                <td class="noExl">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-xe/canh-bao-tai-san/xoa/'.$sua->canhbao_id)}}"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-xe/canh-bao-tai-san/sua/'.$sua->canhbao_id)}}"><i
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
            oTable = $('#canhbao_table').DataTable({
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

            $("#btn_canhbao").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#canhbao_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

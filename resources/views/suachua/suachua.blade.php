@extends('index')

@section('title')
    <title>NESOL | Sửa chữa/bảo dưỡng</title>
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
                @if(isset($suachua_edit))
                    <div class="card-body">
                        @foreach($suachua_edit as $key => $sua_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa thông tin</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-xe/sua-chua/bao-duong/capnhat/'.$sua_edit->suachua_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Biển số xe</label>
                                    <select class="select2" name="xe_id">
                                        <option value="">Chọn biển số</option>
                                        @foreach($xe as $key => $xe)
                                            <option value="{{$xe->xe_id}}" {{$sua_edit->xe_id == $xe->xe_id ? 'selected': ''}}>{{$xe->biensoxe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('xe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày sửa</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaysua" value="{{ \Carbon\Carbon::parse($sua_edit->ngaysua)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaysua'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaysua') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nơi sửa</label>
                                    <input type="text" placeholder="" class="form-control" name="noisua" value="{{$sua_edit->noisua}}">
                                    @if ($errors->has('noisua'))
                                        <p class="text-danger font-italic">{{ $errors->first('noisua') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nội dung sửa</label>
                                    <textarea type="text" placeholder="" class="form-control" name="noidung"><?php echo htmlspecialchars($sua_edit->noidung); ?></textarea>
                                    @if ($errors->has('noidung'))
                                        <p class="text-danger font-italic">{{ $errors->first('noidung') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tổng tiền</label>
                                    <input type="text" placeholder="" class="form-control" name="tongtien" value="{{$sua_edit->tongtien}}">
                                    @if ($errors->has('tongtien'))
                                        <p class="text-danger font-italic">{{ $errors->first('tongtien') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ghi chú</label>
                                    <input type="text" placeholder="" class="form-control" name="ghichu" value="{{$sua_edit->ghichu}}">
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
                        <form class="new-added-form" action="{{URL::to('/quan-ly-xe/sua-chua/bao-duong/luu')}}" method="post">
                            @csrf
                            <div class="row">
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
                                    <label>Ngày sửa</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaysua" value="{{old('ngaysua')}}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaysua'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaysua') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nơi sửa</label>
                                    <input type="text" placeholder="" class="form-control" name="noisua" value="{{old('noisua')}}">
                                    @if ($errors->has('noisua'))
                                        <p class="text-danger font-italic">{{ $errors->first('noisua') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nội dung sửa</label>
                                    <textarea type="text" placeholder="" class="form-control" name="noidung">{{old('noidung')}}</textarea>
                                    @if ($errors->has('noidung'))
                                        <p class="text-danger font-italic">{{ $errors->first('noidung') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tổng tiền</label>
                                    <input type="text" placeholder="" class="form-control" name="tongtien" value="{{old('tongtien')}}">
                                    @if ($errors->has('tongtien'))
                                        <p class="text-danger font-italic">{{ $errors->first('tongtien') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ghi chú</label>
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
                @endif
            </div>
        </div>
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Danh sách sửa chữa/bảo dưỡng</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_suachua">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="suachua_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="suachua_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Biển số xe</th>
                                <th>Ngày sửa</th>
                                <th>Nơi sửa</th>
                                <th>Nội dung sửa</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Người cập nhật</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($suachua as $key => $sua)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sua->suachua_id}}</td>
                                <td>{{$sua->biensoxe}}</td>
                                <td>{{ \Carbon\Carbon::parse($sua->ngaysua)->format('d/m/Y') }}</td>
                                <td>{{$sua->noisua}}</td>
                                <td>{!! nl2br($sua->noidung)!!}</td>
                                <td>{{$sua->tongtien}}</td>
                                <td>{{$sua->ghichu}}</td>
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
                                            <a onclick="return confirm('Bạn có chắc muốn xoá trường này?')" class="dropdown-item" href="{{URL::to('/quan-ly-xe/sua-chua/bao-duong/xoa/'.$sua->suachua_id)}}"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-xe/sua-chua/bao-duong/sua/'.$sua->suachua_id)}}"><i
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
            oTable = $('#suachua_table').DataTable({
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

            $("#btn_suachua").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#suachua_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

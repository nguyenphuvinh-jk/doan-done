@extends('index')

@section('title')
    <title>NESOL | Giấy tờ xe</title>
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
                @if(isset($giaytoxe_edit))
                    <div class="card-body">
                        @foreach($giaytoxe_edit as $key => $gt_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa thông tin</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form text-dark" action="{{URL::to('/quan-ly-xe/giay-to-xe/capnhat/'.$gt_edit->giayto_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Loại giấy tờ</label>
                                    <select class="select2" name="loaigiaytoxe">
                                        <option value="">Chọn loại giấy tờ</option>
                                        @foreach($loaigiayto as $key => $loaigt)
                                            <option value="{{$loaigt->id}}" {{$gt_edit->loaigiayto == $loaigt->id ? 'selected': ''}}>{{$loaigt->tengiayto}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('loaigiaytoxe'))
                                        <p class="text-danger font-italic">{{ $errors->first('loaigiaytoxe') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Biển số xe</label>
                                    <select class="select2" name="xe_id">
                                        <option value="">Chọn biển số xe</option>
                                        @foreach($xe as $key => $xe)
                                            <option value="{{$xe->xe_id}}" {{$gt_edit->xe_id == $xe->xe_id ? 'selected': ''}}>{{$xe->biensoxe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('xe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày cấp</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaycap" value="{{ \Carbon\Carbon::parse($gt_edit->ngaycap)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaycap'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaycap') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày hết hạn</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayhethan" value="{{ \Carbon\Carbon::parse($gt_edit->ngayhethan)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngayhethan'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngayhethan') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Đơn vị cấp</label>
                                    <input type="text" placeholder="" class="form-control" name="donvicap" value="{{$gt_edit->donvicap}}">
                                    @if ($errors->has('donvicap'))
                                        <p class="text-danger font-italic">{{ $errors->first('donvicap') }}</p>
                                    @endif
                                </div>
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
                        <form class="new-added-form text-dark" action="{{URL::to('/quan-ly-xe/giay-to-xe/luu')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Loại giấy tờ</label>
                                    <select class="select2" name="loaigiaytoxe">
                                        <option value="">Chọn loại giấy tờ</option>
                                        @foreach($loaigiayto as $key => $loaigt)
                                            <option value="{{$loaigt->id}}">{{$loaigt->tengiayto}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('loaigiaytoxe'))
                                        <p class="text-danger font-italic">{{ $errors->first('loaigiaytoxe') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Biển số xe</label>
                                    <select class="select2" name="xe_id">
                                        <option value="">Chọn biển số xe</option>
                                        @foreach($xe as $key => $xe)
                                            <option value="{{$xe->xe_id}}">{{$xe->biensoxe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('xe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày cấp</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaycap">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaycap'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaycap') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày hết hạn</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayhethan">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngayhethan'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngayhethan') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Đơn vị cấp</label>
                                    <input type="text" placeholder="" class="form-control" name="loaigiayto">
                                    @if ($errors->has('donvicap'))
                                        <p class="text-danger font-italic">{{ $errors->first('donvicap') }}</p>
                                    @endif
                                </div>
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
                            <h3>Danh sách xe</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_giaytoxe">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="giaytoxe_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="giaytoxe_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Loại giấy tờ</th>
                                <th>Biển số xe</th>
                                <th>Ngày cấp</th>
                                <th>Ngày hết hạn</th>
                                <th>Đơn vị cấp</th>
                                <th>Thời hạn</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($giaytoxe as $key => $gtxe)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$gtxe->giayto_id}}</td>
                                <td>{{$gtxe->tengiayto}}</td>
                                <td>{{$gtxe->biensoxe}}</td>
                                <td>{{ \Carbon\Carbon::parse($gtxe->ngaycap)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($gtxe->ngayhethan)->format('d/m/Y') }}</td>
                                <td>{{$gtxe->donvicap}}</td>
                                @if($gtxe->ngayhethan > \Carbon\Carbon::today())
                                <td><?php echo 'Còn '.floor(abs(strtotime($gtxe->ngayhethan) - strtotime(\Carbon\Carbon::today()))/(24*60*60)).' ngày' ?></td>
                                @else
                                    <td>Hết hạn</td>
                                @endif
                                <td class="noExl">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-xe/giay-to-xe/xoa/'.$gtxe->giayto_id)}}"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-xe/giay-to-xe/sua/'.$gtxe->giayto_id)}}"><i
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
            oTable = $('#giaytoxe_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Danh sách xe',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_giaytoxe").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#giaytoxe_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

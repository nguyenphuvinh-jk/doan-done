@extends('index')

@section('title')
    <title>NESOL | Bằng lái xe</title>
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
                @if(isset($banglai_edit))
                    <div class="card-body">
                        @foreach($banglai_edit as $key => $bl_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa bằng lái</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-tai-xe/bang-lai/capnhat/'.$bl_edit->banglai_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tên bằng lái </label>
                                    <input type="text" placeholder="" class="form-control" name="tenbanglai" value="{{$bl_edit->tenbanglai}}">
                                    @if ($errors->has('tenbanglai'))
                                        <p class="text-danger font-italic">{{ $errors->first('tenbanglai') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tên tài xế </label>
                                    <select class="select2" name="taixe_id">
                                        <option value="">Chọn tài xế</option>
                                        @foreach($taixe as $key => $tx)
                                            <option value="{{$tx->taixe_id}}" {{$bl_edit->taixe_id == $tx->taixe_id ? 'selected': ''}}>{{$tx->ten_taixe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('taixe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('taixe_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày cấp</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaycap" value="{{ \Carbon\Carbon::parse($bl_edit->ngaycap)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaycap'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaycap') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Ngày hết hạn</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayhethan" value="{{ \Carbon\Carbon::parse($bl_edit->ngayhethan)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngayhethan'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngayhethan') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Đơn vị cấp</label>
                                    <input type="text" placeholder="" class="form-control" name="donvicap" value="{{$bl_edit->donvicap}}">
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
                                <h3>Thêm bằng lái</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-tai-xe/bang-lai/luu')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tên bằng lái </label>
                                    <input type="text" placeholder="" class="form-control" name="tenbanglai">
                                    @if ($errors->has('tenbanglai'))
                                        <p class="text-danger font-italic">{{ $errors->first('tenbanglai') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Tên tài xế </label>
                                    <select class="select2" name="taixe_id">
                                        <option value="">Chọn tài xế</option>
                                        @foreach($taixe as $key => $tx)
                                            <option value="{{$tx->taixe_id}}">{{$tx->ten_taixe}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('taixe_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('taixe_id') }}</p>
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
                                    <input type="text" placeholder="" class="form-control" name="donvicap">
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
                            <h3>Danh sách bằng lái</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_banglai">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="banglai_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="banglai_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Tên bằng lái</th>
                                <th>Tên tài xế</th>
                                <th>Ngày cấp</th>
                                <th>Ngày hết hạn</th>
                                <th>Đơn vị cấp</th>
                                <th>Thời hạn</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($banglai as $key => $bl)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$bl->banglai_id}}</td>
                                <td>{{$bl->tenbanglai}}</td>
                                <td>{{$bl->ten_taixe}}</td>
                                <td>{{ \Carbon\Carbon::parse($bl->ngaycap)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($bl->ngayhethan)->format('d/m/Y') }}</td>
                                <td>{{$bl->donvicap}}</td>
                                @if($bl->ngayhethan > \Carbon\Carbon::today())
                                    <td><?php echo 'Còn '.floor(abs(strtotime($bl->ngayhethan) - strtotime(\Carbon\Carbon::today()))/(24*60*60)).' ngày' ?></td>
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
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-tai-xe/bang-lai/xoa/'.$bl->banglai_id)}}"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-tai-xe/bang-lai/sua/'.$bl->banglai_id)}}"><i
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
            oTable = $('#banglai_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Danh sách bằng lái',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_banglai").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#banglai_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>

@endsection

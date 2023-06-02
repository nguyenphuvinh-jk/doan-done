@extends('index')

@section('title')
    <title>NESOL | Hợp đồng</title>
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
                @if(isset($hopdong_edit))
                    <div class="card-body">
                        @foreach($hopdong_edit as $key => $hd_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa hợp đồng</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen/capnhat/'.$hd_edit->hd_id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Mã Hợp Đồng</label>
                                    <input type="text" placeholder="" class="form-control" name="hd_id" value="{{$hd_edit->hd_id}}" disabled>
                                    @if ($errors->has('hd_id'))
                                        <p class="text-danger font-italic">{{ $errors->first('hd_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Khách Hàng</label>
                                    <select class="select2" name="ten_kh">
                                        <option value="">Chọn khách hàng</option>
                                        @foreach($khachhang as $key => $kh)
                                            <option value="{{$kh->kh_id}}" {{$hd_edit->ten_kh == $kh->kh_id? 'selected': ''}}>{{$kh->ten_kh}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ten_kh'))
                                        <p class="text-danger font-italic">{{ $errors->first('ten_kh') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Ngày kí hợp đồng</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaybatdau_hd" value="{{ \Carbon\Carbon::parse($hd_edit->ngaybatdau_hd)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaybatdau_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaybatdau_hd') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Ngày kết thúc hợp đồng</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayhethan_hd" value="{{ \Carbon\Carbon::parse($hd_edit->ngayhethan_hd)->format('d/m/Y') }}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngayhethan_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngayhethan_hd') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nội dung HD</label>
                                    <textarea type="text" placeholder="" class="form-control" name="noidung_hd"><?php echo htmlspecialchars($hd_edit->noidung_hd); ?></textarea>
                                    @if ($errors->has('noidung_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('noidung_hd') }}</p>
                                    @endif
                                </div>

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" placeholder="" class="form-control" name="nguoitao" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
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
                                <h3>Thêm hợp đồng</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen/luu')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Khách Hàng</label>
                                    <select class="select2" name="ten_kh">
                                        <option value="">Chọn khách hàng</option>
                                        @foreach($khachhang as $key => $kh)
                                            <option value="{{$kh->kh_id}}">{{$kh->ten_kh}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ten_kh'))
                                        <p class="text-danger font-italic">{{ $errors->first('ten_kh') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Ngày kí hợp đồng</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngaybatdau_hd" value="{{old('ngaybatdau_hd')}}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngaybatdau_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngaybatdau_hd') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Ngày kết thúc hợp đồng</label>
                                    <input type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' name="ngayhethan_hd" value="{{old('ngayhethan_hd')}}">
                                    <i class="far fa-calendar-alt"></i>
                                    @if ($errors->has('ngayhethan_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('ngayhethan_hd') }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label>Nội dung HD</label>
                                    <textarea type="text" placeholder="" class="form-control" name="noidung_hd">{{old('ngaybatdau_hd')}}</textarea>
                                    @if ($errors->has('noidung_hd'))
                                        <p class="text-danger font-italic">{{ $errors->first('noidung_hd') }}</p>
                                    @endif
                                </div>

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" placeholder="" class="form-control" name="nguoitao" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
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
                            <h3>Danh sách hợp đồng</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_hopdong">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="hopdong_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="hopdong_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hợp đồng</th>
                                <th>Khách hàng</th>
                                <th>Ngày kí kết</th>
                                <th>Ngày kết thúc</th>
                                <th>Nội dung HD</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Người tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($hopdong as $key => $hd)
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td>{{$hd->hd_id}}</td>
                                    <td>{{$hd->ten_kh}}</td>
                                    <td>{{ \Carbon\Carbon::parse($hd->ngaybatdau_hd)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($hd->ngayhethan_hd)->format('d/m/Y') }}</td>
                                    <td>{!! nl2br($hd->noidung_hd)!!}</td>
                                    @if($hd->ngayhethan_hd >= Carbon\Carbon::today())
                                        <td>Còn hạn</td>
                                    @else
                                        <td>Hết hạn</td>
                                    @endif
                                    <td>{{ \Carbon\Carbon::parse($hd->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{$hd->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a onclick="return confirm('Bạn muốn xóa trường này?')" class="dropdown-item" href="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen/xoa/'.$hd->hd_id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                                <a class="dropdown-item" href="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen/sua/'.$hd->hd_id)}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
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
            oTable = $('#hopdong_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Hợp đồng vận chuyển',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_hopdong").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#hopdong_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

@extends('index')

@section('title')
    <title>NESOL | Phiếu điều xe</title>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

@endsection

@section('contents')
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Thêm phiếu điều xe</h3>
                            @include('components.errors')
                        </div>
                    </div>
                    <form class="new-added-form" action="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe/luu')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Mã đơn hàng</label>
                                <select class="select2" id="donhang" name="donhang_id">
                                    <option value="">Chọn mã đơn</option>
                                    @foreach($donhang as $key => $dh)
                                        <option value="{{$dh->dh_id}}">{{$dh->dh_id}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('donhang_id'))
                                    <p class="text-danger font-italic">{{ $errors->first('donhang_id') }}</p>
                                @endif
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Loại xe</label>
                                <select class="select2" id="loaixe" name="loaixe">
                                    <option value="">Chọn loại xe</option>
                                    @foreach($loaixe as $key => $lx)
                                        <option value="{{$lx->loaixe_id}}">{{$lx->ten_loaixe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('loaixe'))
                                    <p class="text-danger font-italic">{{ $errors->first('loaixe') }}</p>
                                @endif
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Biển số xe</label>
                                <select class="select2" id="xe" name="xe_id"></select>
                                @if ($errors->has('xe_id'))
                                    <p class="text-danger font-italic">{{ $errors->first('xe_id') }}</p>
                                @endif
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Lái xe </label>
                                <select class="select2" name="laixe">
                                    <option value="">Chọn lái xe</option>
                                    @foreach($laixe as $key => $lx)
                                        <option value="{{$lx->taixe_id}}">{{$lx->ten_taixe}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('laixe'))
                                    <p class="text-danger font-italic">{{ $errors->first('laixe') }}</p>
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <input type="hidden" placeholder="" class="form-control" name="nguoitao_dx" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            @endif
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Danh sách điều xe</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_dieuxe">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="dieuxe_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="dieuxe_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>T/g vận chuyển</th>
                                <th>Ngày vận chuyển</th>
                                <th>Ngày Kết thúc</th>
                                <th>Loại xe</th>
                                <th>Biển số xe</th>
                                <th>Mã lái xe</th>
                                <th>Tên lái xe</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Người cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($dieuxe as $key => $dx)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$dx->dieuxe_id}}</td>
                                <td>{{$dx->donhang_id}}</td>
                                <td>{{$dx->tg_batdau}}</td>
                                <td>{{ \Carbon\Carbon::parse($dx->ngaybatdau)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($dx->ngayketthuc)->format('d/m/Y') }}</td>
                                <td>{{$dx->ten_loaixe}}</td>
                                <td>{{$dx->biensoxe}}</td>
                                <td>{{$dx->taixe_id}}</td>
                                <td>{{$dx->ten_taixe}}</td>
                                <td>{{ \Carbon\Carbon::parse($dx->created_at)->format('d/m/Y h:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($dx->updated_at)->format('d/m/Y h:i:s') }}</td>
                                <td>{{$dx->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe/xoa/'.$dx->dieuxe_id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe/sua/'.$dx->dieuxe_id)}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
                                            <a class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe/xem/'.$dx->dieuxe_id)}}"><i class="fas fa-eye text-dark-pastel-green"></i>Xem</a>
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
            oTable = $('#dieuxe_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Điều xe vận chuyển',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_dieuxe").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#dieuxe_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#loaixe').on('change', function () {
                var loaixeId = this.value;

                    $('#xe').html('');
                    $.ajax({
                        url: '{{ route('getXe') }}?loaixe_id='+loaixeId,
                        type: 'get',
                        success: function (res) {
                            $('#xe').html('<option value="">Chọn biển số xe</option>');
                            $.each(res, function (key, value) {
                                $('#xe').append('<option value="' + value
                                    .xe_id + '">' + value.biensoxe + '</option>');
                            });
                        }
                    });

            });
        });
    </script>

@endsection

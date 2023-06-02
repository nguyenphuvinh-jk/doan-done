@extends('index')

@section('title')
    <title>NESOL | Thông tin lái xe</title>
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
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Danh sách lái xe</h3>
                    @include('components.errors')
                </div>
            </div>
            <form class="mg-b-20">
                <div class="row gutters-8">
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <a href="{{URL::to('/quan-ly-tai-xe/thong-tin-tai-xe/them')}}" class="btn fw-btn-fill btn-gradient-yellow text-white">Thêm</a>
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <a href="#" class="btn fw-btn-fill btn-gradient-yellow text-white" id="btn_taixe">Tải xuống</a>
                    </div>
                    <div class="col-6-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Tìm kiếm ..." class="form-control" id="taixe_search">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap" id="taixe_table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Số CCCD</th>
                        <th>Tài khoản ngân hàng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($taixe as $key => $taixe)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$taixe->taixe_id}}</td>
                        <td>{{$taixe->ten_taixe}}</td>
                        <td>{{ \Carbon\Carbon::parse($taixe->ngaysinh)->format('d/m/Y') }}</td>
                        <td>{{$taixe->sdt}}</td>
                        <td>{{$taixe->diachi}}</td>
                        <td>{{$taixe->CCCD}}</td>
                        <td>{{$taixe->tknh}}</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="flaticon-more-button-of-three-dots"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a onclick="return confirm('Có chắc muốn xoá chưa?')" class="dropdown-item" href="{{ URL::to('/quan-ly-tai-xe/thong-tin-tai-xe/xoa/'.$taixe->taixe_id) }}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                    <a class="dropdown-item" href="{{ URL::to('/quan-ly-tai-xe/thong-tin-tai-xe/sua/'.$taixe->taixe_id) }}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
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
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/intl.js"></script>

    <!-- Date Picker Js -->
    <script src="{{ asset('public/js/datepicker.min.js') }}"></script>

    <script src="{{ asset('public/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/js/jszip.min.js') }}"></script>
    <script src="{{ asset('public/js/buttons.html5.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>

    <script>

        if ($.fn.DataTable !== undefined) {
            oTable = $('#taixe_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                buttons: [{
                    extend: 'excel',
                    title: 'Danh sách lái xe',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_taixe").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#taixe_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

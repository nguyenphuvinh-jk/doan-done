@extends('index')

@section('title')
    <title>NESOL | Giá cước vận chuyển</title>
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
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Thêm giá cước</h3>
                        </div>
                    </div>
                    <form class="new-added-form">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Trọng tải xe</label>
                                <select class="select2">
                                    <option value="">Chọn trọng tải xe</option>
                                    <option value="1">1 tấn</option>
                                    <option value="2">1,5 tấn</option>
                                    <option value="3">2,5 tấn</option>
                                    <option value="4">3,5 tấn</option>
                                    <option value="5">5 tấn</option>
                                    <option value="6">8 tấn</option>
                                    <option value="7">10 tấn</option>
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Quãng đường</label>
                                <select class="select2">
                                    <option value="0">Chọn khoảng cách</option>
                                    <option value="1"><= 20km</option>
                                    <option value="2">> 20km</option>
                                    <option value="3">> 30km</option>
                                    <option value="4">> 50km</option>
                                    <option value="5">> 100km</option>
                                    <option value="6">> 200km</option>
                                    <option value="7">> 300km</option>
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Giá xe thường</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Giá xe lạnh</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
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
                            <h3>Danh sách giá cước vận chuyển</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="fw-btn-fill btn-gradient-yellow text-center text-white" id="btn_giacuoc">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="text_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="giacuoc_table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Trọng tải</th>
                                <th>Quãng đường</th>
                                <th>Giá xe thường</th>
                                <th>Giá xe lạnh</th>
                                <th class="noExl">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#0021</td>
                                <td>Accounting</td>
                                <td>Mathematics</td>
                                <td>4</td>
                                <td>02/05/2001</td>
                                <td class="noExl">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
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
            oTable = $('#giacuoc_table').DataTable({
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
                    title: 'Giá cước vận chuyển',
                    className: "buttonsToHide",
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
                ]
            });

            oTable.buttons('.buttonsToHide').nodes().addClass('hidden');

            $("#btn_giacuoc").on("click", function() {
                oTable.button( '.buttons-excel' ).trigger();
            });

            $('#text_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>
@endsection

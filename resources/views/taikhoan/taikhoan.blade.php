@extends('index')

@section('title')
    <title>NESOL | Tài khoản</title>
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
                @if(isset($taikhoan_edit))
                    <div class="card-body">
                        @foreach($taikhoan_edit as $key => $tk_edit)
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Sửa tài khoản</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/tai-khoan/capnhat/'.$tk_edit->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" placeholder="" class="form-control" name="name" value="{{$tk_edit->name}}">
                                    @if ($errors->has('name'))
                                        <p class="text-danger font-italic">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="" class="form-control" name="email" value="{{$tk_edit->email}}">
                                    @if ($errors->has('email'))
                                        <p class="text-danger font-italic">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" placeholder="" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <p class="text-danger font-italic">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Quyền hạn</label>
                                    <select class="select2" name="quyenhan">
                                        <option value="">Chọn quyền</option>
                                        <option value="0" {{$tk_edit->quyenhan == 0? 'selected': ''}}>Admin</option>
                                        <option value="1" {{$tk_edit->quyenhan == 1? 'selected': ''}}>Kế Hoạch</option>
                                        <option value="2" {{$tk_edit->quyenhan == 2? 'selected': ''}}>QL Đội Xe</option>
                                        <option value="3" {{$tk_edit->quyenhan == 3? 'selected': ''}}>Kế Toán</option>
                                    </select>
                                    @if ($errors->has('quyenhan'))
                                        <p class="text-danger font-italic">{{ $errors->first('quyenhan') }}</p>
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
                                <h3>Thêm tài khoản</h3>
                                @include('components.errors')
                            </div>
                        </div>
                        <form class="new-added-form" action="{{URL::to('/tai-khoan/luu')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" placeholder="" class="form-control" name="name">
                                    @if ($errors->has('name'))
                                        <p class="text-danger font-italic">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="" class="form-control" name="email">
                                    @if ($errors->has('email'))
                                        <p class="text-danger font-italic">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" placeholder="" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <p class="text-danger font-italic">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label>Quyền hạn</label>
                                    <select class="select2" name="quyenhan">
                                        <option value="">Chọn quyền</option>
                                        <option value="0" >Admin</option>
                                        <option value="1" >Kế Hoạch</option>
                                        <option value="2" >QL Đội Xe</option>
                                        <option value="3" >Kế Toán</option>
                                    </select>
                                    @if ($errors->has('quyenhan'))
                                        <p class="text-danger font-italic">{{ $errors->first('quyenhan') }}</p>
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
                            <h3>Danh sách tài khoản</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-6 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="taikhoan_search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="taikhoan_table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Quyền hạn</th>
                                <th>Trạng thái</th>
                                <th>Khóa tài khoản</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taikhoan as $key => $tk)
                            <tr>
                                <td>{{$tk->id}}</td>
                                <td>{{$tk->name}}</td>
                                <td>{{$tk->email}}</td>
                                @if($tk->quyenhan==0)
                                    <td>Admin</td>
                                @endif
                                @if($tk->quyenhan==1)
                                    <td>Kế hoạch</td>
                                @endif
                                @if($tk->quyenhan==2)
                                    <td>QL đội xe</td>
                                @endif
                                @if($tk->quyenhan==3)
                                    <td>Kế toán</td>
                                @endif
                                @if($tk->isOnline())
                                    <td class="text-success">Online</td>
                                @else
                                    <td>Offline</td>
                                @endif
                                @if($tk->status == 0)
                                    <td class="text-center">
                                        <a  href="{{URL::to('/tai-khoan/khoa/'.$tk->id)}}"><i class="fas fa-lock-open text-dark-pastel-green"></i></a>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <a  href="{{URL::to('/tai-khoan/mo-khoa/'.$tk->id)}}"><i class="fas fa-lock text-dark"></i></a>
                                    </td>
                                @endif

                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="return confirm('Bạn có chắc muốn xoá trường này?')" class="dropdown-item" href="{{URL::to('/tai-khoan/xoa/'.$tk->id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="{{URL::to('/tai-khoan/sua/'.$tk->id)}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
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
            oTable = $('#taikhoan_table').DataTable({
                destroy: true,
                paging: true,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
            });

            $('#taikhoan_search').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
        }
    </script>

@endsection

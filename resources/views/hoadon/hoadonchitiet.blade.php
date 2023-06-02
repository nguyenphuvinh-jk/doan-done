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
    <link rel="stylesheet" href="{{ asset('public/css/hoa_don_style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('public/js/modernizr-3.6.0.min.js') }}"></script>
@endsection

@section('contents')
    <div class="row">
        <div class="cs-container">
            <div class="card height-auto">
                @foreach($hoadon as $key => $hd)
                <div class="card-body p-50 printId" id="download_section">
                    <div class="heading-layout1 border-bottom mb-5">
                        <div class="item-title">
                            <p class="lh-15"><b class="text-dark">Mã hóa đơn:</b> #{{$hd->hoadon_id}}</p>
                            <p class=""><b class="text-dark">Ngày: </b>{{\Carbon\Carbon::parse($hd->created_at)->format('d/m/Y')}}</p>
                        </div>
                    </div>

                    <div class="cs-invoice_head cs-mb10" style="line-height: 1.5em">
                        <div class="cs-invoice_left">
                            <b class="text-dark">Chủ hàng: </b>
                            <p></p>
                            <p>Tên đơn vị: {{$hd->ten_kh}} </p>
                             <p>Địa chỉ: {{$hd->diachi_kh}}</p>
                             <p>Số điện thoại: {{$hd->sdt_kh}}</p>
                        </div>
                        <div class="cs-invoice_left">
                            <b class="cs-primary_color">Đơn vị vận chuyển:</b>
                            <p></p>
                            <p>Tên đơn vị: cái gì đó </p>
                            <p>Địa chỉ: 365 Bloor Street East, </p>
                            <p>Số điện thoại: 0098890</p>
                        </div>
                    </div>

                    <div class="cs-invoice_head cs-mb10">
                        <div class="cs-invoice_left">
                            <b class="text-dark">Thông tin đơn hàng: </b>
                            <p></p>
                            <p>Ngày đặt hàng: {{\Carbon\Carbon::parse($hd->ngaydat)->format('d/m/Y')}} </p>
                            <p>Loại hàng: {{$hd->ten_loaihang}}</p>
                            <p>Trọng lượng: {{$hd->trongluong}} {{$hd->ten_dvt}}</p>
                            <p>Thời gian bắt đầu:  {{$hd->tg_batdau}}</p>
                            <p>Ngày bắt đầu: {{\Carbon\Carbon::parse($hd->ngaybatdau)->format('d/m/Y')}}</p>
                            <p>Ngày kết thúc: {{\Carbon\Carbon::parse($hd->ngayketthuc)->format('d/m/Y')}}</p>
                            <p>Địa điểm lấy hàng: {{$hd->dd_layhang}}</p>
                            <p>Địa điểm giao hàng: {{$hd->dd_giaohang}}</p>
                        </div>
                    </div>

                    <table class="table">
                        <h5 class="text-center text-uppercase font-bold">Đơn giá thuê xe</h5>
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Loaị xe</th>
                            <th class="cs-text_right">Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td class="cs-text_right">john@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td class="cs-text_right">mary@example.com</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dooley</td>
                            <td class="cs-text_right">july@example.com</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <h5 class="text-center text-uppercase font-bold">Chi phí phát sinh</h5>
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nội dung chi</th>
                            <th class="cs-text_right">Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td class="cs-text_right">john@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td class="cs-text_right">mary@example.com</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dooley</td>
                            <td class="cs-text_right">july@example.com</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td>Thuế</td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Tổng đơn</td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

                <div class="card-body">
                    <div class="cs-invoice_btns">
                        <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24"/></svg>
                            <span>In</span>
                        </a>
                        <button id="download_btn" class="cs-invoice_btn cs-color2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/></svg>
                            <span>Tải xuống</span>
                        </button>
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

@endsection

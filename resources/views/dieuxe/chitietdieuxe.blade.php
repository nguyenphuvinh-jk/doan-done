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
                <div class="card-body p-50 printId" id="download_section_xe">
                    @foreach($dieuxe as $key => $dx)
                    <div class="text-center pb-5">
                        <p class="text-uppercase text-dark font-bold">Cộng hòa xã hội chủ nghĩa việt nam</p>
                        <p class="text-dark font-bold">Độc lập - Tự do - Hạnh phúc</p>
                        <p>----------o0o----------</p>
                        <h4 class="text-uppercase text-dark font-bold">Lệnh điều xe</h4>
                        <p>Mã phiếu: {{$dx->dieuxe_id}}</p>
                    </div>

                    <div class="cs-invoice_head cs-mb10">
                        <div class="cs-invoice_left text-dark">
                            <p>Theo ủy quyền của Giám đốc Công ty TNHH NESOL. </p>
                            <p>Căn cứ theo yêu cầu vận chuyển hàng hóa của đơn hàng {{$dx->dh_id}} ngày {{ \Carbon\Carbon::parse($dx->ngaydat)->format('d') }} tháng {{ \Carbon\Carbon::parse($dx->ngaydat)->format('m') }} năm {{ \Carbon\Carbon::parse($dx->ngaydat)->format('Y') }} .</p>
                            <p>Phòng kế hoạch tiến hành điều động xe {{$dx->biensoxe}} thuộc loại xe {{$dx->ten_loaixe}} cho đơn hàng với nội dung chi tiết như sau: </p>
                        </div>
                    </div>

                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap table-bordered w-100 text-dark">
                                <tbody>
                                    <tr>
                                        <td class="w-50 ">1. Thông tin đơn vị vận tải</td>
                                        <td class="w-50 ">2. Thông tin lái xe</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Đơn vị vận tải: Công ty TNHH NESOL</td>
                                        <td class="w-50">Họ tên lái xe: {{$dx->ten_taixe}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Địa chỉ: Lô 5 khu chung cư Bình Kiều 1, <br> Phường Đông Hải 2</td>
                                        <td class="w-50">Hạng bằng lái xe: {{$dx->tenbanglai}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Số điện thoại liên hệ: 0877716438</td>
                                        <td class="w-50">Số điện thoại liên hệ: {{$dx->sdt}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">3. Thông tin khách hàng</td>
                                        <td class="w-50">4. Thông tin chuyến đi</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Tên khách hàng: <br> {{$dx->ten_kh}}</td>
                                        <td class="w-50">Tuyến vận chuyển:<br>{{$dx->ten_tuyenduong}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Địa chỉ: {{$dx->diachi_kh}}</td>
                                        <td class="w-50">Điển xếp hàng: <br>{{$dx->dd_layhang}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Số điện thoại liên hệ: {{$dx->sdt_kh}}</td>
                                        <td class="w-50">Điển giao hàng: <br>{{$dx->dd_giaohang}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">5. Thông tin hàng hóa</td>
                                        <td class="w-50">Thời gian dự kiến: {{$dx->tg_batdau}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Ngày đặt hàng: {{ \Carbon\Carbon::parse($dx->ngaydat)->format('d/m/Y') }}</td>
                                        <td class="w-50">Ngày bắt đầu: {{ \Carbon\Carbon::parse($dx->ngaybatdau)->format('d/m/Y') }} </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Loại hàng hóa: {{$dx->ten_loaihang}}</td>
                                        <td class="w-50">Ngày kết thúc: {{ \Carbon\Carbon::parse($dx->ngayketthuc)->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">Số lượng: {{$dx->trongluong}} {{$dx->ten_dvt}}</td>
                                        <td class="w-50">Thời gian chờ: {{$dx->gioluuca}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 text-center" colspan="2">6. Phần dành co người xếp, dỡ hàng hóa lên, xuống xe ghi</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">
                                            <p class="text-dark">Thông tin về xếp hàng lên xe</p>
                                            <p>- Xếp lần 1: Địa điểm: ... </p>
                                            <p>Khối lượng hàng ........ thời gian ....</p>
                                            <p>Xác nhận của người xếp: ....</p>
                                            <p>- Xếp lần 2: Địa điểm: ... </p>
                                            <p>Khối lượng hàng ........ thời gian ....</p>
                                            <p>Xác nhận của người xếp: ....</p>
                                        </td>
                                        <td class="w-50">
                                            <p>Thông tin về dỡ hàng lên xe</p>
                                            <p>- Dỡ lần 1: Địa điểm: ... </p>
                                            <p>Khối lượng hàng ........ thời gian ....</p>
                                            <p>Xác nhận của người dỡ: ....</p>
                                            <p>- Dỡ lần 2: Địa điểm: ... </p>
                                            <p>Khối lượng hàng ........ thời gian ....</p>
                                            <p>Xác nhận của người dỡ: ....</p>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    <br><br>
                        <div class="cs-invoice_head cs-mb10">
                            <div class="cs-invoice_left">
                            </div>
                            <div class="cs-invoice_left">
                                <p>Hải Phòng, Ngày {{\Carbon\Carbon::today()->format('d')}} tháng {{\Carbon\Carbon::today()->format('m')}} năm {{\Carbon\Carbon::today()->format('Y')}}</p>
                                <p class="text-center">Người điều xe</p>
                                <p></p>
                            </div>
                        </div>
                    @endforeach
                </div>

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

    <script src="{{ asset('public/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('public/js/html2canvas.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>
@endsection

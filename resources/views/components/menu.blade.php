<div class="sidebar-menu-content">
    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
        <li class="nav-item">
            <a href="{{URL::to('/trang-chu')}}" class="nav-link {{ request()->is('/') ? 'menu-active' : '' }} {{ request()->is('trang-chu') ? 'menu-active' : '' }}"><i class="flaticon-dashboard"></i><span class="menu-active">Tổng quan</span></a>
        </li>
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Quản lý danh mục</span></a>
            <ul class="nav sub-group-menu {{ request()->is('quan-ly-danh-muc*') ? 'sub-group-active' : '' }}">
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/don-vi-tinh')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/don-vi-tinh*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Đơn vị tính</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/loai-xe')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/loai-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Loại xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/hang-xe')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/hang-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Hãng xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/loai-hang')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/loai-hang*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Loại hàng</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/tuyen-duong')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/tuyen-duong*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Tuyến đường</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-danh-muc/loai-giay-to-xe')}}" class="nav-link {{ request()->is('quan-ly-danh-muc/loai-giay-to-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Loại giấy tờ xe</a>
                </li>
            </ul>
        </li>
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Quản lý khách hàng</span></a>
            <ul class="nav sub-group-menu {{ request()->is('quan-ly-khach-hang*') ? 'sub-group-active' : '' }}">
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-khach-hang/khach-hang')}}" class="nav-link {{ request()->is('quan-ly-khach-hang/khach-hang*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Thông tin khách hàng</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-khach-hang/hop-dong-van-chuyen')}}" class="nav-link {{ request()->is('quan-ly-khach-hang/hop-dong-van-chuyen*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Hợp đồng vận chuyển</a>
                </li>
            </ul>
        </li>
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-calendar"></i><span>Quản lý vận chuyển</span></a>
            <ul class="nav sub-group-menu {{ request()->is('quan-ly-van-chuyen*') ? 'sub-group-active' : '' }}">
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-van-chuyen/don-hang')}}" class="nav-link {{ request()->is('quan-ly-van-chuyen/don-hang*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-van-chuyen/phieu-dieu-xe')}}" class="nav-link {{ request()->is('quan-ly-van-chuyen/phieu-dieu-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Phiếu điều xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen')}}" class="nav-link {{ request()->is('quan-ly-van-chuyen/hoa-don-van-chuyen*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Hóa đơn vận chuyển</a>
                </li>
            </ul>
        </li>
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-bus-side-view"></i><span>Quản lý xe</span></a>
            <ul class="nav sub-group-menu {{ request()->is('quan-ly-xe*') ? 'sub-group-active' : '' }}">
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-xe/thong-tin-xe')}}" class="nav-link {{ request()->is('quan-ly-xe/thong-tin-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Thông tin xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-xe/giay-to-xe')}}" class="nav-link {{ request()->is('quan-ly-xe/giay-to-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Giấy tờ xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-xe/canh-bao-tai-san')}}" class="nav-link {{ request()->is('quan-ly-xe/canh-bao-tai-san*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Cảnh báo tài sản</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-xe/sua-chua/bao-duong')}}" class="nav-link {{ request()->is('quan-ly-xe/sua-chua/bao-duong*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Sửa chữa/bảo dưỡng</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-xe/cap-phat-nhien-lieu')}}" class="nav-link {{ request()->is('quan-ly-xe/cap-phat-nhien-lieu*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Cấp phát nhiên liệu</a>
                </li>
            </ul>
        </li>
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Quản lý lái xe</span></a>
            <ul class="nav sub-group-menu {{ request()->is('quan-ly-tai-xe*') ? 'sub-group-active' : '' }}">
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-tai-xe/thong-tin-tai-xe')}}" class="nav-link {{ request()->is('quan-ly-tai-xe/thong-tin-tai-xe*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Thông tin lái xe</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/quan-ly-tai-xe/bang-lai')}}" class="nav-link {{ request()->is('quan-ly-tai-xe/bang-lai*') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Bằng lái xe</a>
                </li>
            </ul>
        </li>
        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->quyenhan==0)
        <li class="nav-item">
            <a href="{{URL::to('/tai-khoan')}}" class="nav-link {{ request()->is('tai-khoan*') ? 'menu-active' : '' }}"><i class="flaticon-user"></i><span>Tài khoản</span></a>
        </li>
        @endif
    </ul>
</div>

<div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
        <div class="header-logo">
            <a href="{{URL::to('/trang-chu')}}">
                <img src="{{asset('public/img/logo.png')}}" alt="logo">
            </a>
        </div>
        <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
            </button>
        </div>
    </div>
    <div class="d-md-none mobile-nav-bar">
        <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav">
            <li class="navbar-item header-search-bar">
                <div class="input-group stylish-input-group">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="navbar-item dropdown header-admin">
                @if(\Illuminate\Support\Facades\Auth::check())
                <a class="navbar-nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                        @if(\Illuminate\Support\Facades\Auth::user()->quyenhan==0)
                        <span>Admin</span>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->quyenhan==1)
                            <span>Kế hoạch</span>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->quyenhan==2)
                            <span>QL đội xe</span>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->quyenhan==3)
                            <span>Kế toán </span>
                        @endif
                    </div>
                    <div class="admin-img">
                        <img src="{{asset('public/img/figure/admin.jpg')}}" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                    </div>
                    <div class="item-content">
                        <ul class="settings-list">
                            <li><a href="{{URL::to('/dang-xuat')}}"><i class="flaticon-turn-off"></i>Thoát</a></li>
                        </ul>
                    </div>
                </div>
                @endif
            </li>
        </ul>
    </div>
</div>

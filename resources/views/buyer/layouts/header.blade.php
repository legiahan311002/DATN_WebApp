<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        {{-- Modal đăng xuất --}}
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Chọn "Đăng xuất" nếu bạn chắc chắn.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar flex-w h-full">
                    <a href="{{ route('seller.changeChannel') }}" class="flex-c-m trans-04 p-lr-25">
                        Kênh người bán
                    </a>

                    <a href="{{ route('seller.register') }}" class="flex-c-m trans-04 p-lr-25">
                        Đăng ký thành người bán
                    </a>
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa-solid fa-circle-question"></i>
                        Hỗ trợ
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i class="fa-solid fa-bell"></i>
                        Thông báo
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{ route('buyer.home') }}" class="logo" style="color: #000">
                    <h4><b>SEASIDE</b></h4>
                </a>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <form action="{{ route('buyer.product.search') }}" method="post">
                        @csrf
                        <div class="input-wrapper flex-w">
                            <input type="text" name="search1" placeholder="Tìm kiếm..."
                                value="@if (session('search')) {{ session('search') }} @endif"
                                class="search-input">
                            <button type="submit" class="icon-search zmdi zmdi-search"></button>
                        </div>
                    </form>


                    <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                    <a href="{{ route('client.cart.index') }}"
                        class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="@if (session('countCart')) {{ session('countCart') }}
                @else
                    0 @endif">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                </div>

                {{-- @if (session('username'))
                    @php
                        $user = \App\Models\User::where('username', session('username'))->first();
                    @endphp
                    <div class="nav-item dropdown">
                        <a href="#" style="height: 100%;color: #bf6d72;" class="nav-link dropdown-toggle"
                            onclick="toggleDropdown()" data-bs-toggle="dropdown">
                            <img src="{{ $user->avt }}" alt="" class="rounded-circle"
                                style=" width: 50px;height: 50px;">
                            {{ $user->username }}
                        </a>
                        <div id="userDropdown" class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fa-solid fa-user"></i> Thông
                                tin cá nhân</a>
                            <a href="{{ route('logout') }}" class="dropdown-item" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                        </div>
                    </div>
                @else
                    <a style="margin-left: 20px;color: inherit;" href="{{ route('buyer.login') }}">Đăng nhập</a>
                @endif --}}
                @if (session('username'))
                    @php
                        $buyerProfile = \App\Models\BuyerProfile::where('username', session('username'))->first();
                    @endphp
                    <div class="nav-item dropdown">
                        <a href="#" style="height: 100%;color: #bf6d72;" class="nav-link dropdown-toggle"
                            onclick="toggleDropdown()" data-bs-toggle="dropdown">
                            <div class="small-avatar-container">
                                <img src="{{ $buyerProfile->avt }}" alt="" class="rounded-circle small-avatar">
                            </div>
                            {{ $buyerProfile->username }}
                        </a>
                        <div id="userDropdown" class="dropdown-menu">
                            <a href="{{ route('profile') }}" class="dropdown-item"><i class="fa-solid fa-user"></i> Thông
                                tin cá nhân</a>
                            <a href="{{ route('logout') }}" class="dropdown-item" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                        </div>
                    </div>
                @else
                    <a style="margin-left: 20px;color: inherit;" href="{{ route('buyer.login') }}">Đăng nhập</a>
                @endif

            </nav>
        </div>
    </div>
</header>

<script src="js/dropdown_header.js"></script>

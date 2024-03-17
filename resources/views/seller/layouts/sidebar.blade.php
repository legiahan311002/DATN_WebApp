<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/seller1" class="brand-link d-flex justify-content-center align-items-center text-center text-white">
        <h5><b>SEASIDE</b> - Trang người bán</h5>
    </a>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (session('username'))
            @php
            $shopProfile = \App\Models\shopProfile::where('username', session('username'))->first();
            @endphp
            <div class="image">
                <img src="{{ $shopProfile->avt }}" class="img-circle elevation-2" alt="Shop Image" style="width: 50px; height: 50px">
            </div>
            <div class="info">
                <h6 href="" class="d-block text-white" >{{ $shopProfile->name_shop}}</h6>
            </div>
            @endif
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/seller1/" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/seller1/categories-child/list" class="nav-link text-white">
                        <i class="nav-icon fas fa-bars"></i>
                        <p> Danh Mục</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/seller1/products/list" class="nav-link text-white">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p> Sản Phẩm </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Khách hàng
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/seller1/orders/list" class="nav-link text-white">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p> Đơn hàng </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/seller1/vouchers/list" class="nav-link text-white">
                        <i class="nav-icon fas fa-tag"></i>
                        <p> Mã giảm giá </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/seller1/infos/info" class="nav-link text-white">
                        <i class="nav-icon fas fa-store"></i>
                        <p> Thông tin shop </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
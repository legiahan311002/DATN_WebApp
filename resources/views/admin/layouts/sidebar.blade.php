<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #161b2c">
    <a href="" class="brand-link d-flex justify-content-center align-items-center text-center text-white">
        <h5><b>SEASIDE</b> - Trang Admin</h5>
    </a>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (session('username'))
            @php
            $user = \App\Models\User::where('username', session('username'))->first();
            @endphp
            <div class="image">
                <img src="https://png.pngtree.com/png-vector/20191125/ourmid/pngtree-beautiful-admin-roles-line-vector-icon-png-image_2035379.jpg" class="img-circle elevation-2" alt="Shop Image" style="width: 30px; height: 30px">
            </div>
            <div class="info">
                <h6 href="" class="d-block text-white" >{{ $user->username }}</h6>
            </div>
            @endif
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: #161b2c">
                <div class="input-group-append">
                    <button class="btn btn-sidebar" style="background-color: #161b2c">
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
                    <a href="/admin" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/category" class="nav-link text-white">
                        <i class="nav-icon fas fa-bars"></i>
                        <p> Danh Mục</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/approve" class="nav-link text-white">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Người bán
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/vouchers/list" class="nav-link text-white">
                        <i class="nav-icon fas fa-tag"></i>
                        <p> Mã giảm giá </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
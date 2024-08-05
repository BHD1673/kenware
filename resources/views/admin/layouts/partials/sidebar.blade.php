        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="/admin" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="/admin" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Trang chính</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="/admin/" class="nav-link" data-key="t-analytics"> Thống kê chi tiết </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Sản phẩm</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Danh mục
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarSignIn">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="{{url('admin/danh-muc')}}" class="nav-link" data-key="t-cover"> Xem danh sách
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile" data-key="t-profile"> Sản phẩm
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarProfile">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{url('admin/san-pham')}}" class="nav-link" data-key="t-simple-page">
                                                   Thêm sản phẩm mới </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('admin/san-pham/them-moi')}}" class="nav-link" data-key="t-settings"> Xem danh sách sản phẩm </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Order sản phẩm</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLanding">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('admin/san-phach')}}" class="nav-link" data-key="t-one-page"> Tạo đơn mới </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/don-hang')}}" class="nav-link" data-key="t-multi-level"> Xem danh sách đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        

                        
                        {{-- I do this later --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="ri-map-pin-line"></i> <span data-key="t-maps">Cấu hình nạp</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMaps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('admin/nap-the-cao')}}" class="nav-link" data-key="t-google">
                                            Nạp thẻ cào
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/nap-atm')}}" class="nav-link" data-key="t-vector">
                                            Nạp ATM
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/bien-dong-giao-dich')}}" class="nav-link" data-key="t-leaflet">
                                            Biến dộng giao dịch
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
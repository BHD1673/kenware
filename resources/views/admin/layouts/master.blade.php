<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    @include('admin.layouts.partials.seo')

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Ensure the custom fonts are recognized by the editor */
        .ql-font-roboto {
            font-family: 'Roboto', sans-serif;
        }
        .ql-font-oswald {
            font-family: 'Oswald', sans-serif;
        }
        .ql-font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
        .ql-font-lato {
            font-family: 'Lato', sans-serif;
        }
        .ql-font-raleway {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="/admin" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
                                </span>
                            </a>

                            <a href="/admin" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        {{-- <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="/admin" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                <a href="/admin" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/users/avatar-2.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/users/avatar-3.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/users/avatar-5.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="{{ asset('pages-search-results.html') }}" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form> --}}
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img" src="{{ asset('assets/admin/images/flags/us.svg') }}" alt="Header Language" height="20" class="rounded">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                            <img src="{{ asset('assets/admin/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">English</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="sp" title="Spanish">
                            <img src="{{ asset('assets/admin/images/flags/spain.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">Española</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="gr" title="German">
                            <img src="{{ asset('assets/admin/images/flags/germany.svg') }}" alt="user-image" class="me-2 rounded" height="18"> <span class="align-middle">Deutsche</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="it" title="Italian">
                            <img src="{{ asset('assets/admin/images/flags/italy.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">Italiana</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="ru" title="Russian">
                            <img src="{{ asset('assets/admin/images/flags/russia.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">русский</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="ch" title="Chinese">
                            <img src="{{ asset('assets/admin/images/flags/china.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">中国人</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="fr" title="French">
                            <img src="{{ asset('assets/admin/images/flags/french.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">français</span>
                        </a>

                        <!-- item-->
                        <a href="{{ asset('javascript:void(0);') }}" class="dropdown-item notify-item language" data-lang="ar" title="Arabic">
                            <img src="{{ asset('assets/admin/images/flags/ae.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">Arabic</span>
                        </a>
                    </div>
                </div> --}}
                        {{-- 
                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category-alt fs-22'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fw-semibold fs-15"> Web Apps </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ asset('#!') }}" class="btn btn-sm btn-soft-info"> View All Apps
                                        <i class="ri-arrow-right-s-line align-middle"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/github.png') }}" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/bitbucket.png') }}" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/dribbble.png') }}" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/dropbox.png') }}" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/mail_chimp.png') }}" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="{{ asset('#!') }}">
                                        <img src="{{ asset('assets/admin/images/brands/slack.png') }}" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                        @include('admin.layouts.components.modals')
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="{{ asset('https://cdn.lordicon.com/gsqxdxog.json') }}" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Bạn có muốn xoá thông báo này</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Có, hãy xoá
                                đi !</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @include('admin.layouts.partials.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    @yield('main-content')
                                </div>
                                <!--end row-->

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->

                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> @ 2syk
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Tôi yêu phụ nữ
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    @include('admin.layouts.components.customizer')

    <div class="customizer-setting d-none d-md-block" datasqstyle="{&quot;top&quot;:null}" datasquuid="a072962d-b91e-41ae-a666-e442ce00f51c" style="top: 862px;" datasqtop="862">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class="mdi mdi-spin mdi-cog-outline fs-22"></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.js') }}"></script>
    
    <!-- Dashboard init -->
    <script src="{{ asset('assets/admin/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    <script>
        const _0x5019b0 = _0x1030;

        function _0x62b1() {
            const _0x26485a = ['h1,\x20h2,\x20p,\x20div', '858060kygnyB', 'fontFamily', '25676840VvoHlJ',
                '\x22Roboto\x22,\x20sans-serif', '8022322BVFaHp', '437352FLbVLF', '150rfqivz', '966124LIwKRx',
                'querySelectorAll', '3DKCwJq', '911336BAQTYW', '224034aqEhwC', 'style', '27YvMhdo'
            ];
            _0x62b1 = function() {
                return _0x26485a;
            };
            return _0x62b1();
        }(function(_0x1838b2, _0x3b8855) {
            const _0x2200d1 = _0x1030,
                _0x100676 = _0x1838b2();
            while (!![]) {
                try {
                    const _0x21e033 = parseInt(_0x2200d1(0x158)) / 0x1 + -parseInt(_0x2200d1(0x150)) / 0x2 + -parseInt(
                            _0x2200d1(0x152)) / 0x3 * (-parseInt(_0x2200d1(0x153)) / 0x4) + parseInt(_0x2200d1(0x14f)) /
                        0x5 * (-parseInt(_0x2200d1(0x154)) / 0x6) + -parseInt(_0x2200d1(0x15c)) / 0x7 + -parseInt(
                            _0x2200d1(0x14e)) / 0x8 * (parseInt(_0x2200d1(0x156)) / 0x9) + parseInt(_0x2200d1(0x15a)) /
                        0xa;
                    if (_0x21e033 === _0x3b8855) break;
                    else _0x100676['push'](_0x100676['shift']());
                } catch (_0x51cba7) {
                    _0x100676['push'](_0x100676['shift']());
                }
            }
        }(_0x62b1, 0xb4bc5));

        function _0x1030(_0x4a0d16, _0x42bd97) {
            const _0x62b14b = _0x62b1();
            return _0x1030 = function(_0x103004, _0x340e08) {
                _0x103004 = _0x103004 - 0x14e;
                let _0x23f004 = _0x62b14b[_0x103004];
                return _0x23f004;
            }, _0x1030(_0x4a0d16, _0x42bd97);
        }
        const elementsToStyle = document[_0x5019b0(0x151)](_0x5019b0(0x157));
        elementsToStyle['forEach'](_0x25095f => {
            const _0x211f9c = _0x5019b0;
            _0x25095f[_0x211f9c(0x155)][_0x211f9c(0x159)] = _0x211f9c(0x15b);
        });
    </script>
</body>

</html>

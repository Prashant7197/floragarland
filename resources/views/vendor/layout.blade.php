<!DOCTYPE html>
<html class="light-style layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard |{{ env('APP_NAME') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/logo/logo-trans.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/adminpanel//assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/adminpanel//assets/vendor/css/core.css" />
    <link rel="stylesheet" href="/adminpanel//assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="/adminpanel//assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/adminpanel//assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/adminpanel//assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Helpers -->
    <script src="/adminpanel//assets/vendor/js/helpers.js"></script>
    <script src="/adminpanel//assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="height: auto;">
                    <a href="/admin" class="app-brand-link m-auto ">
                        <span class="app-brand-logo demo">
                            <img src="{{ env('APP_LOGO') }}" style="height:110px;" />
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="/admin" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Application</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div>Vendor</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/vendor" class="menu-link">
                                    <div data-i18n="Without navbar">All Vendor</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/vendor/create" class="menu-link">
                                    <div data-i18n="Without menu">Add new Vendor</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div>Lawn</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/lawn" class="menu-link">
                                    <div data-i18n="Without navbar">All Lawn</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/lawn/create" class="menu-link">
                                    <div data-i18n="Without menu">Add new Lawn</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div>Agent</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('agent.create') }}" class="menu-link">
                                    <div data-i18n="Without menu">Add new Agent</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('agent.index') }}" class="menu-link">
                                    <div data-i18n="Without navbar">All Agent</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div>Feedback</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/feedback" class="menu-link">
                                    <div data-i18n="Without navbar">All Feedback</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/feedback/create" class="menu-link">
                                    <div data-i18n="Without menu">Add new Feedback</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="/admin/customer/" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Customer</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/admin/enquery/" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Enquiry</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/admin/booking/" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Booking</div>
                        </a>
                    </li>



                    {{-- <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Advertisement</span>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Campagn</div>
                        </a>
                    </li> --}}
                    {{-- <li class="menu-item">
                        <a href="icons-boxicons.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Test</div>
                        </a>
                    </li> --}}
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">System</span>
                    </li>
                    <li class="menu-item">
                        <a href="/admin/profile" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Admin Profile</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/admin/security" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Setting</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @if (Auth::user()->profile == null)
                                            <img src="/adminpanel/assets/img/avatars/1.png" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        @else
                                            <img src="/images/user/{{ Auth::user()->profile }}" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        @endif

                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="/admin/profile">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if (Auth::user()->profile == null)
                                                            <img src="/adminpanel/assets/img/avatars/1.png" alt
                                                                class="w-px-40 h-auto rounded-circle" />
                                                        @else
                                                            <img src="/images/user/{{ Auth::user()->profile }}" alt
                                                                class="w-px-40 h-auto rounded-circle" />
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/admin/profile">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/admin/security">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="/admin/billing">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/admin/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('bodycontent')
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/adminpanel/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/adminpanel/assets/vendor/libs/popper/popper.js"></script>
    <script src="/adminpanel/assets/vendor/js/bootstrap.js"></script>
    <script src="/adminpanel/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/adminpanel/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/adminpanel/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/adminpanel/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/adminpanel/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>



    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>

</html>

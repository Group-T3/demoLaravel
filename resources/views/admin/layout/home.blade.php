<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('asset/images/img/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/images/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('asset/css/default.css')}}" rel="stylesheet">

</head>
@if(Auth::user()->role_id == 1)
    <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{asset('asset/images/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{auth::user()->avt}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{auth::user()->fullname}}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{auth::user()->fullname}}</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('auth.logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.home')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin.show.all.products')}}">
                            <i class="bi bi-circle"></i><span>List Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.create.product')}}">
                            <i class="bi bi-circle"></i><span>Create Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.choose.product.delete')}}">
                            <i class="bi bi-circle"></i><span>Delete Product</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin.show.all.categories')}}">
                            <i class="bi bi-circle"></i><span>List Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.form.create.category')}}">
                            <i class="bi bi-circle"></i><span>Create Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.choose.category.delete')}}">
                            <i class="bi bi-circle"></i><span>Delete Category</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>None</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin.show.all.users')}}">
                            <i class="bi bi-circle"></i><span>List All User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.form.create.user')}}">
                            <i class="bi bi-circle"></i><span>Create New User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.choose.user.delete')}}">
                            <i class="bi bi-circle"></i><span>Delete User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.show.all.users.ban')}}">
                            <i class="bi bi-circle"></i><span>List User Banned</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.show.all.users.delete')}}">
                            <i class="bi bi-circle"></i><span>List User Deleted</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin.show.all.roles')}}">
                            <i class="bi bi-circle"></i><span>List Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.form.create.role')}}">
                            <i class="bi bi-circle"></i><span>Create Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.choose.role.delete')}}">
                            <i class="bi bi-circle"></i><span>Delete Role</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('home')}}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>BCorn</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="#">BCorn Team</a>
        </div>
    </footer><!-- End Footer -->

    @elseif(Auth::user()->role_id == null || Auth::user()->role_id != 1)
        <body>
        <main>
            <div class="container">

                <section
                    class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                    <h1>404</h1>
                    <h2>The page you are looking for doesn't exist.</h2>
                    <a class="btn" href="{{route('home')}}">Back to home</a>
                    <img src="{{asset('asset/images/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
                    <div class="credits">
                        Designed by <a href="#">BCorn Team</a>
                    </div>
                </section>

            </div>
        </main><!-- End #main -->
        @else
        @endif
        <!-- ======= Footer ======= -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('asset/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('asset/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('asset/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('asset/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('asset/vendor/simple-datatables/simple-datatables.js')}}."></script>
        <script src="{{asset('asset/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('asset/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('asset/js/default.js')}}"></script>

        </body>

</html>

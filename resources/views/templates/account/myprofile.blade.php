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
<body>
<!-- ======= Header ======= -->

<main id="main" class="main">

    <section class="section profile">
        <div class="row">
            <div>
                <button class="btn btn-primary" style="margin: 16px 0; "><a href="{{route('home')}}"
                                                                            class="text-decoration-none"
                                                                            style="color: white;">Back to home</a>
                </button>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{$user->avt}}" alt="Profile" class="rounded-circle">
                        <h2>{{$user->fullname}}</h2>
                    </div>
                </div>

            </div>

            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    Overview
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                    Change Password
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$user->fullname}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">PhoneNumber</div>
                                    <div class="col-lg-9 col-md-8">{{$user->phonenumber}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{$user->address}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{route('update.profile', ['id'=> $user->id])}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{$user->avt}}" alt="Profile">
                                            <div class="pt-2">
                                                <div class="btn btn-primary btn-sm">
                                                    <label class="upload position-relative">
                                                        <p class="mb-0"><i
                                                                class="bi bi-cloud-arrow-up text-white fs-6"></i></p>
                                                        <input class="opacity-0 hidden position-absolute" type="file"
                                                               name="avt">
                                                    </label>
                                                </div>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                   title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullname" type="text" class="form-control" id="fullName"
                                                   value="{{$user->fullname}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email"
                                                   value="{{$user->email}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phonenumber" class="col-md-4 col-lg-3 col-form-label">Phone
                                            Number</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phonenumber" type="text" class="form-control" id="phonenumber"
                                                   value="{{$user->phonenumber}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="address"
                                                   value="{{$user->address}}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{route('change-password')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                   id="password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input onkeyup='check_pass();' name="newpassword" type="password"
                                                   class="form-control"
                                                   id="newpassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newpasswordConfirm" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input onkeyup='check_pass();' name="newpasswordConfirm" type="password"
                                                   class="form-control"
                                                   id="newpasswordConfirm">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="submit" type="submit" class="btn btn-primary">Change Password
                                        </button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

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
<script>
    function check_pass() {
        if (document.getElementById('newpassword').value === document.getElementById('newpasswordConfirm').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }
</script>
</body>

</html>


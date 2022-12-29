@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{$user->avt}}" alt="Profile" class="rounded-circle">
                            <h2>{{$user->fullname}}</h2>
                            <h3>Web Designer</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
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

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Role</div>
                                        <div class="col-lg-9 col-md-8">{{$user->role->name}}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form  method="post"
                                           action="{{route('admin.update.user', ['id'=> $user->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{$user->avt}}" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullname" type="text" class="form-control" id="fullName" value="{{$user->fullname}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email" value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phonenumber" class="col-md-4 col-lg-3 col-form-label">PhoneNumber</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phonenumber" type="text" class="form-control" id="phonenumber" value="{{$user->phonenumber}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address" value="{{$user->address}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="role_id" class="form-control">
                                                    <option value="{{$user->role_id}}">{{$user->role->name}}</option>
                                                    @foreach($roles as $role)
                                                        @if($user->role_id != $role->id)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Status</label>
                                            <div class="col-md-8 col-lg-9">
                                                    <select class="form-control" id="inputStatus" name="status">
                                                        @if($user->status == "ACTIVE")
                                                            <option value="{{$user->status}}">{{$user->status}}</option>
                                                            <option value="DEACTIVE">DEACTIVE</option>
                                                            <option value="BAN">BAN</option>
                                                            <option value="DELETE">DELETE</option>
                                                        @elseif($user->status == "DEACTIVE")
                                                            <option value="{{$user->status}}">{{$user->status}}</option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="BAN">BAN</option>
                                                            <option value="DELETE">DELETE</option>
                                                        @elseif($user->status == "BAN")
                                                            <option value="{{$user->status}}">{{$user->status}}</option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="DEACTIVE">DEACTIVE</option>
                                                            <option value="DELETE">DELETE</option>
                                                        @else
                                                            <option value="{{$user->status}}">{{$user->status}}</option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="DEACTIVE">DEACTIVE</option>
                                                            <option value="BAN">BAN</option>
                                                        @endif
                                                    </select>
                                            </div>
                                        </div>

{{--                                        <div class="row mb-3">--}}
{{--                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>--}}
{{--                                            <div class="col-md-8 col-lg-9">--}}
{{--                                                <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mb-3">--}}
{{--                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>--}}
{{--                                            <div class="col-md-8 col-lg-9">--}}
{{--                                                <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mb-3">--}}
{{--                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>--}}
{{--                                            <div class="col-md-8 col-lg-9">--}}
{{--                                                <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mb-3">--}}
{{--                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>--}}
{{--                                            <div class="col-md-8 col-lg-9">--}}
{{--                                                <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->
                                    <div>
                                        <h5 class="text-danger" style="margin: 8px 0">If you want to delete this user?
                                            Please click the button below to delete!</h5>
                                    </div>
                                    <form method="POST" action="{{route('admin.hiden.user', ['id' => $user->id])}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                </div>
                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

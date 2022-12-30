@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create User</h5>

                            <form method="post" action="{{route('admin.create.user')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Full Name: </label>
                                    <div class="col-sm-10">
                                        <input name="fullname" type="text" class="form-control" required=""
                                               placeholder="Kevin John">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Avatar: </label>
                                    <div class="col-sm-10">
                                        <input name="avt" type="text" class="form-control" required=""
                                               placeholder="https://cdn.tgdd.vn/Products/Images/522/237695/ipad-pro-m1-11-inch-wifi-2-1.jpg">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control" required=""
                                               placeholder="user@example.com">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPhone" class="col-sm-2 col-form-label">Phone Number: </label>
                                    <div class="col-sm-10">
                                        <input name="phonenumber" type="text" class="form-control" required=""
                                               placeholder="0988688668">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Address: </label>
                                    <div class="col-sm-10">
                                        <input name="address" type="text" class="form-control" required=""
                                               placeholder="HA Noi, Viet Nam">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password: </label>
                                    <div class="col-sm-10">
                                        <input onkeyup='check_pass();' id="password" name="password" type="password" class="form-control"
                                               required="" placeholder="**********">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPrice" class="col-sm-2 col-form-label">Password Confirm: </label>
                                    <div class="col-sm-10">
                                        <input onkeyup='check_pass();' id="confirm_password" name="passwordConfirm" type="password"
                                               class="form-control" required="" placeholder="**********">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCategory" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select name="role_id" class="form-control">
                                            <option value="3">MEMBER</option>
                                            @foreach($roles as $role)
                                                @if($role->status == 'ACTIVE' && $role->name != 'MEMBER')
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Status: </label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control">
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10 text-center" style="margin-top: 18px; margin-left: 100px">
                                        <button id="submit" type="submit" class="btn btn-primary">Create User</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
<script>
    function check_pass() {
        if (document.getElementById('password').value === document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }
</script>

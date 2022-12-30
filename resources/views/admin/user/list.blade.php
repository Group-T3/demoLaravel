@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">List User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search</h5>
                            <form class="row g-3" method="post" action="{{route('admin.search.all.users')}}">
                                @csrf
                                <div class="col-md-2">
                                    <label for="validationDefault01" class="form-label">ID: </label>
                                    <input name="id" type="text" class="form-control" id="validationDefault01"
                                           placeholder="12">
                                </div>
                                <div class="col-md-5">
                                    <label for="validationDefault02" class="form-label">Full name: </label>
                                    <input name="fullname" type="text" class="form-control" id="validationDefault02"
                                           placeholder="user name">
                                </div>
                                <div class="col-md-5">
                                    <label for="validationDefaultUsername" class="form-label">Email: </label>
                                    <input name="email" type="text" class="form-control" id="validationDefaultUsername"
                                           aria-describedby="inputGroupPrepend2" placeholder="email@example.com">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault03" class="form-label">Address: </label>
                                    <input name="address" type="text" class="form-control" id="validationDefault03"
                                           placeholder="Ha Noi">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault05" class="form-label">PhoneNumber: </label>
                                    <input name="phonenumber" type="text" class="form-control" id="validationDefault05"
                                           placeholder="0808080808">
                                </div>
                                <div class="col-md-2">
                                    <label for="validationDefault04" class="form-label">Status: </label>
                                    <select name="status" class="form-select" id="validationDefault04">
                                        <option selected="selected" value="">Select Status</option>
                                        @foreach($statusList as $status)
                                            <option>{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="validationDefault06" class="form-label">Role: </label>
                                    <select class="form-select" style="width: 150px" name="role_id">
                                        <option selected="selected" value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <button class="btn btn-secondary" style="margin: 8px 16px "><a
                                            href="{{route('admin.show.all.users')}}"
                                            style="color: white">Reset</a></button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List User</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FullName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">PhoneNumber</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                @foreach($users as $user)
                                    <tbody>
                                    <tr>
                                        <td><a class="text-decoration-none"
                                               href="detail/{{$user->id}}">{{$user->id}}</a></td>
                                        <td><a class="text-decoration-none"
                                               href="detail/{{$user->id}}">{{$user->fullname}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phonenumber}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

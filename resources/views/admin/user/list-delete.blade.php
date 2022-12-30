@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Banned</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">List User Banned</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

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
                                    @if($user->status == \App\Enums\UserStatus::DELETE)
                                        <tbody>
                                        <tr>
                                            <td><a class="text-decoration-none" href="detail/{{$user->id}}">{{$user->id}}</a></td>
                                            <td><a class="text-decoration-none" href="detail/{{$user->id}}">{{$user->fullname}}</a></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phonenumber}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td>{{$user->status}}</td>
                                        </tr>
                                        </tbody>
                                    @endif
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

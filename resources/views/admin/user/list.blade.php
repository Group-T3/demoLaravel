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
       <form method="post" action="{{route('admin.show.filter')}}">
           @csrf
           <div class="d-flex " style="float: right">
               <label class="" style="margin: 9px 24px 0 0">
                   <select class="form-control" style="width: 150px" name="role_id">
                       <option datd-display="" value="Search">Search</option>
                       @foreach($roles as $role)
                           @if($role->status == 'ACTIVE')
                               <option value="{{$role->id}}">{{$role->name}}</option>
                           @endif
                       @endforeach
                   </select>
               </label>
               <button type="submit" class="btn btn-primary" style="margin: 8px 0">Search</button>
               <button class="btn btn-secondary" style="margin: 8px 16px "><a href="{{route('admin.show.all.users')}}" style="color: white">Reset</a></button>
           </div>
       </form>

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

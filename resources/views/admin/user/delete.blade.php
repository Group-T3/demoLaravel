
@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Delete User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-danger">Delete User</h5>
                            <p>If you perform a user deletion, it will be removed from the user list!
                                This action cannot be undone...You need to think carefully before doing this!!!</p>

{{--                            <form class="row g-3" action="{{route('admin.delete.user')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="validation" class="form-label">ID: </label>--}}
{{--                                    <input name="id" type="number" class="form-control" id="id" required="" placeholder="1">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <button id="btn-delete" class="btn btn-danger" type="submit">Delete</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                            <div class="alert alert-warning">Sorry, Comming Soon !!!</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
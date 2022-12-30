@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">List Category</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Category</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                @foreach($categories as $category)
                                    <tbody>
                                    <tr>
                                        <td><a class="text-decoration-none" href="detail/{{$category->id}}">{{$category->id}}</a></td>
                                        <td><a class="text-decoration-none" href="detail/{{$category->id}}">{{$category->name}}</a></td>
                                        <td>{{$category->desc}}</td>
                                        <td>{{$category->status}}</td>
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

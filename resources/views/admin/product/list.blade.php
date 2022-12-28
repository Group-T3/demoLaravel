@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">List Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Default Table</h5>--}}

{{--                            <!-- Default Table -->--}}
{{--                            <table class="table">-->--}}
{{--                                <thead>-->--}}
{{--                                <tr>-->--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope="col">Name</th>--}}
{{--                                    <th scope="col">Position</th>--}}
{{--                                    <th scope="col">Age</th>--}}
{{--                                    <th scope="col">Start Date</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">1</th>--}}
{{--                                    <td>Brandon Jacob</td>--}}
{{--                                    <td>Designer</td>--}}
{{--                                    <td>28</td>--}}
{{--                                    <td>2016-05-25</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">2</th>--}}
{{--                                    <td>Bridie Kessler</td>--}}
{{--                                    <td>Developer</td>--}}
{{--                                    <td>35</td>--}}
{{--                                    <td>2014-12-05</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <!-- End Default Table Example -->--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Product</h5>

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category_id</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                @foreach($products as $product)
                                    <tbody>
                                    <tr>
                                        <td><a class="text-decoration-none" href="detail/{{$product->id}}">{{$product->id}}</a></td>
                                        <td><a class="text-decoration-none" href="detail/{{$product->id}}">{{$product->name}}</a></td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->desc}}</td>
                                        <td>{{$product->category_id}}</td>
                                        <td>{{$product->status}}</td>
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

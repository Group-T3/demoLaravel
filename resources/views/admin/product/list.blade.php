@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">List Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search</h5>
                            <form class="row g-3" method="post" action="{{route('admin.search.all.products')}}">
                                @csrf
                                <div class="col-md-2">
                                    <label for="validationDefault01" class="form-label">ID: </label>
                                    <input name="id" type="text" class="form-control" id="validationDefault01"
                                           placeholder="12">
                                </div>
                                <div class="col-md-5">
                                    <label for="validationDefault02" class="form-label">Product name: </label>
                                    <input name="name" type="text" class="form-control" id="validationDefault02"
                                           placeholder="Macbook">
                                </div>
                                <div class="col-md-5">
                                    <label for="validationDefaultUsername" class="form-label">Description: </label>
                                    <input name="desc" type="text" class="form-control" id="validationDefaultUsername"
                                           aria-describedby="inputGroupPrepend2" placeholder="This is the description">
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault03" class="form-label">Price: </label>
                                    <input name="price" type="text" class="form-control" id="validationDefault03"
                                           placeholder="99.99">
                                </div>
                                <div class="col-md-3">
                                    <label for="validationDefault04" class="form-label">Status: </label>
                                    <select name="status" class="form-select" id="validationDefault04">
                                        <option selected="selected" value="">Select Status</option>
                                        @foreach($statusList as $status)
                                            <option>{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationDefault06" class="form-label">Category: </label>
                                    <select class="form-select" name="category_id">
                                        <option selected="selected" value="">Select Category</option>
                                        @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <button class="btn btn-secondary" style="margin: 8px 16px "><a
                                            href="{{route('admin.show.all.products')}}"
                                            style="color: white">Reset</a></button>
                                </div>
                            </form>

                        </div>
                    </div>

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
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                @foreach($products as $product)
                                    <tbody>
                                    <tr>
                                        <td><a class="text-decoration-none"
                                               href="detail/{{$product->id}}">{{$product->id}}</a></td>
                                        <td><a class="text-decoration-none"
                                               href="detail/{{$product->id}}">{{$product->name}}</a></td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->desc}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->status}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <!-- End Table with hoverable rows -->
                            {{$products->links('pagination::bootstrap-5')}}
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

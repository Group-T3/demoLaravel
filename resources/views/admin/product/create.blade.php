@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create Product</h5>

                            <form method="post" action="{{route('admin.create.product')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Product Name: </label>
                                    <div class="col-sm-10">
                                        <input  name="name" type="text" class="form-control" required="" placeholder="iPad Pro M1">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity: </label>
                                    <div class="col-sm-10">
                                        <input  min="1" name="qty" type="number" class="form-control" required="" placeholder="99">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPrice" class="col-sm-2 col-form-label">Price: </label>
                                    <div class="col-sm-10">
                                        <input  name="price" type="text" class="form-control" required="" placeholder="88.88">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                @if($category->status == 'ACTIVE')
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Image: </label>
                                    <div class="col-sm-10">
                                        <input  name="images" type="text" class="form-control" required="" placeholder="https://cdn.tgdd.vn/Products/Images/522/237695/ipad-pro-m1-11-inch-wifi-2-1.jpg">
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
                                    <label for="inputDesc" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="desc" class="form-control" required="" placeholder="iPad Pro M1 11-inch WiFi 128GB Tablet (2021)" style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create Product</button>
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

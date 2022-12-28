@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"><img src="{{$product->img}}" width="100"
                                                                    height="100"><span class=""
                                                                                       style="font-size: 24px; margin-left: 8px; color: #012970;">{{$product->name}}</span>
                            </h5>
                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="post"
                                  action="{{route('admin.update.product', ['id'=> $product->id])}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">Product name: </label>
                                    <input name="name" type="text" class="form-control" id="inputName"
                                           value="{{$product->name}}" placeholder="TV Samsung 4k 64 inch" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input name="price" type="text" class="form-control" id="inputPrice"
                                           value="{{$product->price}}" placeholder="99.99" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputQty" class="form-label">Quantity</label>
                                    <input min="1" name="qty" type="number" class="form-control" id="inputQty"
                                           value="{{$product->qty}}" placeholder="99" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCategory" class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                                        @foreach($categories as $category)
                                            @if($product->category_id != $category->id)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputDescription" class="form-label">Description</label>
                                    <input name="desc" type="text" class="form-control" id="inputDescription"
                                           placeholder="1234 Main St" value="{{$product->desc}}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputImage" class="form-label">Image</label>
                                    <input name="img" type="text" class="form-control" id="inputImage"
                                           value="{{$product->img}}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select class="form-control" id="inputStatus" name="status">
                                        @if($product->status == "ACTIVE")
                                            <option value="{{$product->status}}">{{$product->status}}</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                            <option value="DELETE">DELETE</option>
                                        @elseif($product->status == "DEACTIVE")
                                            <option value="{{$product->status}}">{{$product->status}}</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DELETE">DELETE</option>
                                        @else
                                            <option value="{{$product->status}}">{{$product->status}}</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                            <div>
                                <h5 class="text-danger" style="margin: 8px 0">If you want to delete this product?
                                     Please click the button below to delete!</h5>
                            </div>
                            <form method="POST" action="{{route('admin.hiden.product', ['id' => $product->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection

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
       <form method="post" action="{{route('admin.show.products')}}">
           @csrf
           <div class="d-flex " style="float: right">
               <label class="" style="margin: 9px 24px 0 0">
                   <select class="form-control" style="width: 150px" name="category_id">
                       <option datd-display="" value="Search">Search</option>
                       @foreach($categories as $category)
                           @if($category->status == 'ACTIVE')
                               <option value="{{$category->id}}">{{$category->name}}</option>
                           @endif
                       @endforeach
                   </select>
               </label>
               <button type="submit" class="btn btn-primary" style="margin: 8px 0">Search</button>
               <button class="btn btn-secondary" style="margin: 8px 16px "><a href="{{route('admin.show.all.products')}}" style="color: white">Reset</a></button>
           </div>
       </form>

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

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
                                        <td><a class="text-decoration-none" href="detail/{{$product->id}}">{{$product->id}}</a></td>
                                        <td><a class="text-decoration-none" href="detail/{{$product->id}}">{{$product->name}}</a></td>
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

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

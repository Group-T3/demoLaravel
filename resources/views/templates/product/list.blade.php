<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swa"
        rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <title>Product List</title>
</head>
@extends('templates.layout.home')
@section('header')
    <div id="main">
        @endsection
        @section('content')
            <section class="section-products d-flex position-relative">
                <div class="sub-nav">
                    <div class="card part-2 p-3">
                        <div>
                            <h6 class="mt-1">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span class="" style="margin:0 4px">All categoryies</span>
                            </h6>
                            <ul class="categories list-unstyled">
                                @foreach($categories as $category)
                                    <li><a class="text-decoration-none "
                                           href="{{route('show.by.category.products', ['id'=>$category->id])}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                                @if(count($categories) > 6)
                                    <li><a class="text-decoration-none " href="#">More
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a></li>
                                @endif
                            </ul>
                        </div>
                        <div>
                            <h6 class="mt-1">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <span class="" style="margin:0 4px">Search filters</span>
                            </h6>
                            <form>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label class="text-black ">By Category</label>
                                        @foreach($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       id="category{{$category->id}}">
                                                <label class="form-check-label" for="category{{$category->id}}">
                                                    {{$category->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                        @if(count($categories) > 6)
                                            <li><a class="text-decoration-none " href="#">More
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a></li>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label class="text-black ">Additional</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridCheck1" name="price">
                                            <label class="form-check-label" for="gridCheck1">From low to high</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="gridCheck2" name="price">
                                            <label class="form-check-label" for="gridCheck2">From high to low</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Apply</button>
                                <button type="reset" class="btn btn-secondary" style="margin-left: 8px"><a
                                        href="{{route('show.all.products')}}">Reset</a></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div>
                        <div class="row justify-content-center text-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="header">
                                    <h3>Products we offer</h3>
                                    <h2>List Products</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if(count($products) === 0)
                                <div>
                                    <div class="text-center">
                                        <i class="fa fa-exclamation-triangle" style="color: #c69500; font-size: 100px" aria-hidden="true"></i>
                                        <h1 style="color: #c69500; margin: 8px">
                                            No Data
                                        </h1>
                                        <h3 class="text-danger">It looks like the product you're looking for is empty</h3>
                                        <button class="btn btn-primary" style=" margin: 8px">
                                            <a href="{{route('show.all.products')}}" style="padding: 8px">Back</a>
                                        </button>
                                    </div>
                                </div>
                            @else
                                @foreach($products as $product)
                                    <!-- Single Product -->
                                    <div class="col-md-6 col-lg-4 col-xl-3 ">
                                        <div id="product" class="single-product border bg-white">
                                            <div class="part-1"
                                                 style="background: url({{$product->img}}) no-repeat center; background-size: 300px">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="part-2 px-3">
                                                <a class="text-decoration-none"
                                                   href="detail/{{$product->id}}">
                                                    <h3 class="product-title">
                                                        {{$product->name}}
                                                    </h3>
                                                </a>
                                                <h4 class="product-price">{{$product->price}}$</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Single Product -->
                                @endforeach
                                {{$products->links('pagination::bootstrap-5')}}
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endsection
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

</html>

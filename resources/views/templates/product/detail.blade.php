<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <title>Product Detail</title>
</head>
@extends('templates.layout.home')
@section('header')
    <section id="productDetail">
        <div class="container">
            @endsection

            @section('content')
                <div class="">
                    <div class="">
                        <a class="text-decoration-none" href="{{route('home')}}">Home</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a class="text-decoration-none" href="{{route('show.all.products')}}">Products</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a class="text-decoration-none" href="#">{{$product->name}}</a>
                    </div>
                   <form method="post" action="{{route('cart.create')}}">
                       @csrf
                       <div class="d-flex bg-white rounded-3 p-3 mb-3 align-items-center" >
                           <div class="">
                               <img src="{{$product->images}}" width="340px" height="226px" >
                           </div>
                           <div class="description " style="margin: 0 16px; width: 800px">
                               <input type="text" class="d-none" name="user_id" value="{{Auth::user()->id}}">
                               <input type="text" class="d-none" name="product_id" value="{{$product->id}}">
                               <input type="text" class="d-none" name="price" value="{{$product->price}}">
                               <h2>{{$product->name}}</h2>
                               <h1 class="text-danger">${{$product->price}}</h1>
                               <h4>{{$product->desc}}</h4>
                               {{--                            <p>Transport: </p>--}}
                               <h5>Quantity:
                                   <input name="qty" type="number" min="1" value="1" max="{{$product->qty}}">
                                   <span class="" style="color: #bcbcbc">{{$product->qty}} products available</span></h5>
                               <input type="text" class="d-none" name="total_price" value="{{$product->price * $product->qty}}">
                               <div style="margin-top: 16px">
                                   <button class="btn btn-primary" type="submit" style="padding: 8px">Add to Cart</button>
                                   <button class="btn btn-danger" style="padding: 8px; margin-left: 36px">Buy now</button>
                               </div>
                           </div>
                       </div>
                   </form>
                </div>
        @endsection
    </section>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>

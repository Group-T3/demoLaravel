{{--@php use Illuminate\Support\Facades\Auth; @endphp--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swa"
        rel="stylesheet">
    <link href="{{asset('asset/css/cart.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <title>Shopping Cart</title>
</head>
@extends('templates.layout.home')
@section('header')
    <div id="main">
        @endsection
        @section('content')
            <div class="card">
                @if(count($cartsShopping) != 0)
                    <div class="row">
                        <div class="col-md-8 cart">
                            <div class="title">
                                <div class="row">
                                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                                    {{--                                        <div class="col align-self-center text-right text-muted">3 items</div>--}}
                                </div>
                            </div>
                            <div class="row row border-top border-bottom">
                                <div class="row main align-items-center">
                                    <div class="col text-center">
                                        <div class="justify-content-center row">Name</div>
                                    </div>
                                    <div class="col-2 text-center">Unit price</div>
                                    <div class="col-2 text-center">
                                        <div class=" justify-content-center row">Quantity</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        Total Price
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class=" justify-content-center row">Actions</div>
                                    </div>
                                </div>
                            </div>
                            @foreach($cartsShopping as $cart)
                                <div class="row row border-top border-bottom">
                                    @php
                                        $products = $cart->product;
                                    @dd($products)
                                    @endphp
                                    @foreach($products as $product)
                                        <div class="row main align-items-center">
                                            <div class="col-2"><img class="img-fluid" src="{{$product->images}}">
                                            </div>
                                            <div class="col text-center">
                                                <a href=""></a>
                                            </div>
                                            <div class="col-2 text-center">${{$cart->price}}</div>
                                            <div class="col-2 text-center">
                                                <input type="number" min="1" value="{{$cart->qty}}"
                                                       class="mt-4" style="height: 30px; width: 50px">
                                            </div>
                                            <div class="col text-center">${{$cart->total_price}}</div>
                                            <div class="col text-center">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <div class="back-to-shop"><a href="{{route('show.all.products')}}">&leftarrow;<span
                                        class="text-muted">Back to shop</span></a></div>
                        </div>

                        <div class="col-md-4 summary">
                            <div><h5><b>Summary</b></h5></div>
                            <hr>
                            <div class="row">
                                <div class="col" style="padding-left:0;">ITEMS: 3</div>
                                <div class="col text-right">TOTAL: $132.00</div>
                            </div>
                            <form>
                                <p>SHIPPING</p>
                                <select>
                                    <option class="text-muted">Standard-Delivery- $5.00</option>
                                </select>
                                <p>GIVE CODE</p>
                                <input id="code" placeholder="Enter your code">
                            </form>
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL PRICE</div>
                                <div class="col text-right">$137.00</div>
                            </div>
                            <button class="btn">CHECKOUT</button>
                        </div>
                    </div>
                @else
                    <div class="col align-self-center text-right text-muted">No items</div>
                @endif
            </div>
        @endsection
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>

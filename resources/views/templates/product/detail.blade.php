<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Detail</title>
</head>
<body>
<div class="container">
    <div class="img d-flex align-items-center">
        <img src="{{$product->img}}" width="100" height="100">
        <div class="text" style="margin: 16px 36px">
            <h5 class=""> Product: {{$product->name}}</h5>
            <div class="">
                <div class="">ID: {{$product->id}}</div>
                <div class="">Quantity: {{$product->qty}}</div>
                <div class="">Price: {{$product->price}}</div>
                <div class="">Description: {{$product->desc}}</div>
                <div class="">Category: <a class="text-decoration-none" href="/categories/detail/{{$product->category_id}}">{{$product->category->name}}</a> </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

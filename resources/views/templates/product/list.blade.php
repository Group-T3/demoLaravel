<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product List</title>
</head>
<body>
<div class="header">
    <h5 class="title-header ">List Product</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
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
            </tr>
            </tbody>
        @endforeach
    </table>
</div>
</body>
</html>

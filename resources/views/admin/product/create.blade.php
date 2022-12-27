<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
@if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
<div class="header">
    <h2 class="text-center" style="margin: 36px 0">Create product</h2>
</div>
<div class="container d-flex justify-content-center">
    <form method="post" action="{{route('create.product')}}">
        @csrf
        <div  class="row">
            <div class="form-group col-6" style="margin: 16px 0">
                <label for="name" style="margin: 8px 0">Name:</label>
                <input name="name" type="text" class="form-control" id="name"  placeholder="name"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'name'" required="">
            </div>
            <div class="form-group col-6" style="margin: 16px 0">
                <label for="quantity" style="margin: 8px 0">Quantity:</label>
                <input name="qty" type="number" min="1" class="form-control" id="qty"  placeholder="quantity"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'quantity'" required="">
            </div>
            <div class="form-group col-6" style="margin: 16px 0">
                <label for="price" style="margin: 8px 0">Price:</label>
                <input name="price" type="text" class="form-control" id="price"  placeholder="price"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'price'" required="">
            </div>
            <div class="form-group col-6" style="margin: 16px 0">
                <label for="img" style="margin: 8px 0">Image:</label>
                <input name="img" type="text" class="form-control" id="image"  placeholder="image"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'image'" required="">
            </div>
            <div class="form-group col-12" style="margin: 16px 0">
                <label for="desc" style="margin: 8px 0">Description:</label>
                <textarea name="desc" id="desc" class="single-textarea w-100" style="height: 200px; resize: none;" placeholder="description"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'description'" required=""></textarea>
            </div>
        </div>
        <div  style="margin: 24px 0">
            <button type="submit" class="btn btn-primary" style="padding: 8px 16px; float: right">Submit</button>
        </div>
    </form>
    <a href="{{route('home')}}" class="text-danger text-decoration-none" style="padding: 8px 16px; float: left">Back to Home</a>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Detail</title>
</head>
<body>
<div class="container">
    <h5 class=""> <img src="{{$user->avt}}" style="border-radius: 18px;"
                       width="36" height="36"> Welcome user: {{$user->fullname}}</h5>
    <div class="">
        <div class="">ID: {{$user->id}}</div>
        <div class="">ID: {{$user->fullname}}</div>
        <div class="">Quantity: {{$user->email}}</div>
        <div class="">Price: {{$user->phonenumber}}</div>
        <div class="">Description: {{$user->address}}</div>
        <div class="">Role: <a class="text-decoration-none" href="/roles/detail/{{$user->role_id}}">{{$user->role_id}}</a></div>
    </div>
</div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Category Detail</title>
</head>
<body>
<h5 class="">Category: {{$category->name}}</h5>
<div class="">
    <div class="">ID: {{$category->id}}</div>
    <div class="">Name: {{$category->name}}</div>
    <div class="">Description: {{$category->desc}}</div>
</div>
</body>
</html>

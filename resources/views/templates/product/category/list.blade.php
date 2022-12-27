<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Category List</title>
</head>
<body>
    <div class="header">
        <div class="title-header">List Category</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            @foreach($categories as $category)
                <tbody>
                <tr>
                    <td><a class="text-decoration-none" href="detail/{{$category->id}}">{{$category->id}}</a></td>
                    <td><a class="text-decoration-none" href="detail/{{$category->id}}">{{$category->name}}</a></td>
                    <td>{{$category->desc}}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>
</html>

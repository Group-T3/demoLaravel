<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Role List</title>
</head>
<body>
    <div class="header">
        <div class="title-header">List Role</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Desc</th>
            </tr>
            </thead>
            @foreach($roles as $role)
                <tbody>
                <tr>
                    <td><a class="text-decoration-none" href="detail/{{$role->id}}">{{$role->id}}</a></td>
                    <td><a class="text-decoration-none" href="detail/{{$role->id}}">{{$role->name}}</a></td>
                    <td>{{$role->desc}}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>
</html>

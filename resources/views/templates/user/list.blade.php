<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User List</title>
</head>
<body>
    <div class="header">
        <div class="title-header">List User</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FullName</th>
                <th scope="col">Email</th>
                <th scope="col">PhoneNumber</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            @foreach($users as $user)
                <tbody>
                <tr>
                    <td><a class="text-decoration-none" href="detail/{{$user->id}}">{{$user->id}}</a></td>
                    <td><a class="text-decoration-none" href="detail/{{$user->id}}">{{$user->fullname}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phonenumber}}</td>
                    <td>{{$user->address}}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>
</html>

@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet " href="asset/css/style.css">
</head>
<body>
<div id="main" >
    <div id="header" style="background-image: url({{asset('asset/images/bg.jpg')}});">
        <ul id="supHeader">
            <li><a href="/">Home</a></li>
            <li><a href="/products/list">Product</a></li>
            <li><a href="/categories/list">Category</a></li>
            <li><a href="/users/list">User</a></li>
            <li><a href="/roles/list">Role</a></li>
            @if(!Auth::user())
                <li>
                    <a class="" href="{{route('auth.login')}}">
                        Login
                    </a>
                </li>
            @else
                <li><a class="account-user" href="#">
                        Account
                    </a>
                    <ul class="more">
                        <li><a href="#">AccountManager</a></li>
                        <li><a href="#">Setting</a></li>
                        <li>
                            <form action="{{route('auth.logout')}}" method="get">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>

</body>
</html>

@php use Illuminate\Support\Facades\Auth; @endphp

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swa"
        rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <title>Base</title>
</head>

<body>
<div id="main">
    <div id="header">
        <ul id="supHeader">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('show.all.products')}}">Product</a></li>
            <li><a href="#">Category</a></li>
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
                        @if(Auth::user()->role_id == 1)
                            <li><a href="{{route('admin.home')}}">Admin</a></li>
                        @elseif(Auth::user()->role_id == 2)
                            <li><a href="#">Moderator</a></li>
                        @else
                        @endif
                        <li><a href="{{route('myprofile', auth::user()->id)}}">AccountManager</a></li>
                        <li><a href="#">Setting</a></li>
                        <li>
                            <a href="{{route('auth.logout')}}">Logout</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <div style="margin: 100px 50px 0">
        @if(!Auth::user())
            <h1 class="text-center">Hello world</h1>
            <h5 style="margin: 36px 0 0" class="text-center">Click <a href="{{route('auth.login')}}"
                                                                      style="margin: 0 2px"
                                                                      class="text-decoration-none">here</a> to continue
            </h5>
        @else
            <h1 class="text-center">Hello {{auth::user()->fullname}}</h1>
        @endif
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
</html>

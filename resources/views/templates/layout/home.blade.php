<body>

@yield('header')
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
                    <li><a href="{{route('show.cart', auth::user()->id)}}">My Cart</a></li>
                    <li><a href="{{route('myprofile', auth::user()->id)}}">AccountManager</a></li>
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
        @yield('content')
    @endif
</div>
</div>
</body>



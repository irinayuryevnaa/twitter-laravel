<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/layoutstyle.css')}}">

    <title>@yield('title')</title>

</head>
<header>
    <div id="header">

        @auth()
            <form action="{{ route('logout') }}">
            <button id="signup">LogOut</button>
            </form>

            <form action="{{route('user')}}">
                <button id="login">{{$name}}</button>
            </form>

            <form action="{{route('post')}}">
                <input type="image" id="post" src="{{asset('/images/post')}}" alt="Twitter">
            </form>
        @endauth




        @guest()
            <form action = "{{ route('signup') }}" >
            <button id = "signup" > SignUp</button >
            </form >

            <form action = "{{ route('login') }}" >
            <button id = "login" > LogIn</button >
            </form >
        @endguest

            <form action="{{ route('home') }}">
                <input type="image" id="logo" src={{asset('/images/iconTw.svg')}} alt="Twitter">
            </form>

    </div>

</header>
<body>

    <div>
        @yield('content')
    </div>



</body>
</html>

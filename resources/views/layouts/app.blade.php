<!DOCTYPE html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Bloom</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    <nav class="navbar  navbar-dark bg-dark">
        <div  class="mx-auto">
            <a href="{{route('user.login')}}"><img src="{{asset('imagini/logo/bloom2.png')}}" style="width: 150px;height:100px"></a>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>
</body>

</html>
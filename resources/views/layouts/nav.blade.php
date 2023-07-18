<!DOCTYPE html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="{{asset ('imagini/logo/bloom3.png')}}"  type="image/x-icon">

    <title>Bloom</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container">
            <a class="navbar-brand" href="{{route('user.home')}}"><img src="{{asset('imagini/logo/bloom2.png')}}" style="width: 150px;height:100px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-0">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('ev')}}">Evenimente</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produse</a>
                        <ul class="dropdown-menu dropdown-submenu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('aranjamente')}}">Aranjamente florale</a></li>
                            <li><a class="dropdown-item" href="{{route('buchete')}}">Buchete</a></li>
                            <li><a class="dropdown-item" href="{{route('plante')}}">Plante de interior</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="{{route('produs')}}">Toate produsele</a> </li>
                        </ul>
                    </li>
                    @auth
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('favorite')}}"><i class="fa-regular fa-heart"><span style="font-size: 10px;" class="badge badge-pill  fp"></span></i></a></li>
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('cos')}}"><i class="fa fa-basket-shopping"><span style="font-size: 10px;" class="badge badge-pill cp"></span></i></a></li>

                    <li  class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown"><i class="fa-regular fa-circle-user"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                            <li>
                                <h6 style="text-align: center;">{{ Auth::user()->fname }}&nbsp{{ Auth::user()->lname }}</h6>
                            </li>

                            <div class="dropdown-divider"></div>

                            <li>
                                <a class="dropdown-item" href="{{route('cont')}}">Profil</a>
                            </li>

                            <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a> </li>
                        </ul>


                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('user.login')}}">Autentificare</a></li>

                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
        @yield('scripts')
    </div>
    <script src="https://kit.fontawesome.com/14d857cc6f.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/scripturi.js')}}" type="module" crossorigin="anonymous"></script>

</body>

</html>
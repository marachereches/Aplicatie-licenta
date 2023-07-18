<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administrator</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/Admin.css')}}">
    <script src="https://kit.fontawesome.com/14d857cc6f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-dark navbar-expand bg-dark sb-topnav">
            <div class="container-fluid"><a class="navbar-brand" href="{{ route('admin.home') }}">Administrator</a>

                <form class="d-none d-md-inline-block order-2 ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group"></div>
                </form>
                <ul class="navbar-nav d-flex order-3 ms-auto ms-md-0">

                    <li class="nav-item d-flex justify-content-center align-items-center">
                        @auth('admin')

                        <div class="nav-item dropdown no-arrow"><a  class="dropdown-toggle btn btn-dark" aria-expanded="false" data-bs-toggle="dropdown" id="navbarDropdown" role="button"><i class="fa-regular fa-circle-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-end text-start shadow" style="margin-top: 16px;">
                                <a class="dropdown-item" href="#">{{Auth::guard('admin')->user()->email}}</a>
                                <hr class="dropdown-divider" />
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endauth
                    </li>

                </ul>
            </div>
        </nav>
        @auth('admin')
        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">
                <div id="sidenavAccordion" class="sb-sidenav accordion sb-sidenav-dark">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            </br>
                            <div><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                                    <div class="sb-nav-link-icon"></div><span>Produse</span>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                </a>
                                <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <div class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('produs.aranjamente')}}">Aranjamente florale</a>
                                        <a class="nav-link" href="{{route('produs.buchete')}}">Buchete</a>
                                        <a class="nav-link" href="{{route('produs.plante')}}">Plante de interior</a>
                                        <a class="nav-link" href="{{route('produs.index')}}">Toate produsele</a>


                                    </div>
                                </div>
                            </div>
                            <div class="sb-nav-link-icon"></div><span><a class="nav-link collapsed" href="{{ route('eveniment.index') }}">&nbsp&nbspEvenimente</a></span>
                            <div class="sb-nav-link-icon"></div><span><a class="nav-link collapsed" href="{{ route('users.index') }}">&nbsp&nbspClienți înregistrați</a></span>

                            <div><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapse2" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    <div class="sb-nav-link-icon"></div><span>Comenzi</span>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                </a>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-bs-parent="#sidenavAccordion">
                                    <div class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('comanda.procesate') }}">Comenzi procesate</a>
                                        <a class="nav-link" href="{{ route('comanda.livrate') }}">Comenzi livrate</a>
                                        <a class="nav-link" href="{{ route('comanda.anulate') }}">Comenzi anulate</a>
                                        <a class="nav-link" href="{{ route('comanda.index') }}">Toate comenzile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endauth

            <div id="layoutSidenav_content">
                <div class="cont">
                    <main>
                        @yield('content')
                        @yield('scripts')
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/14d857cc6f.js" crossorigin="anonymous"></script>
</body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <title>assets/admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/datatables-select.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ml-auto">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Gammers Zone
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a  class="nav-link" href="#"  >
                                    Hi, {{ Auth::user()->username }} !
                                </a>

                            </li>
                            <li>
                                <div  >
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<script src="{{asset('assets/admin/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/mdb.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/admin/js/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/admin/js/custom.min-2.js')}}"></script>
<script src="{{asset('assets/admin/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/datatables-select.min.js')}}"></script>

<script src="{{asset('assets/admin/js/axios.min.js')}}"></script>
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
@yield('script')
</body>
</html>

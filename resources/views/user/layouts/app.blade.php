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

    <link rel="stylesheet" href="assets/user/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/user/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="assets/user/css/style.css">
</head>
<body>
    <div id="app">
        @include('user.layouts.menu')

        <main class="">
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

<script src="assets/user/js/jquery.min.js"></script>
<script src="assets/user/js/owl.carousel.min.js"></script>

<script src="{{asset('assets/admin/js/axios.min.js')}}"></script>
<script src="jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script src="{{asset('assets/user/js/custom.js')}}"></script>
@yield('script')
</body>
</html>

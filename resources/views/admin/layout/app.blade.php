<!DOCTYPE html>
<html lang="en">
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
<body class="fix-header fix-sidebar">

    
@include('admin.layout.menu')

@yield('content')




</div>
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
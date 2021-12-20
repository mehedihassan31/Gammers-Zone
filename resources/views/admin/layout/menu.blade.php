<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li> 
                 <li class="nav-item mt-3">ADMIN</li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="{{url('/logout')}}" class="btn btn-sm btn-danger">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    <li> <a href="{{url('/admin')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Dashboard</span></a></li>
                    <li> <a href="{{url('/admin/slider')}}" ><span> <i class="far fa-comments"></i> </span><span class="hide-menu">Slider</span></a></li>
                   <li> <a href="{{url('/admin/products')}}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Products</span></a></li>
                   <li> <a href="{{url('/admin/order')}}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Order</span></a></li>
                   <li> <a href="{{url('/admin/users')}}" ><span> <i class="fas fa-book-open"></i> </span><span class="hide-menu">Users</span></a></li>
                   <li> <a href="{{url('/admin/transections')}}" ><span> <i class="fas fa-tasks"></i> </span><span class="hide-menu">Transections</span></a></li>
                   
                   <li> <a href="{{url('/admin/games')}}" ><span> <i class="far fa-envelope"></i> </span><span class="hide-menu">Games</span></a></li>
                   <li> <a href="{{url('/admin/results')}}" ><span> <i class="far fa-comments"></i> </span><span class="hide-menu">Results Publish</span></a></li>
                </ul>
            </nav>
        </div>
    </aside>
<div class="page-wrapper">
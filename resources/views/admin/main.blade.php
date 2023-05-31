<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Booking Lapang Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/Sidebar.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/Sidebar-Menu.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/Sidebar-Menu-sidebar.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/Sidebar-navbar.css')}}" >
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
</head>

<body style="background: #ffffff;">
    <nav class="navbar navbar-light navbar-expand-md py-3" style="background: #000000;height: 160px;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span style="color: rgb(255,255,255);font-size: 24px;font-family: Poppins, sans-serif;font-weight: bold;">Booking Lapang</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon" style="background: rgba(255,255,255,0.68);border-radius: 20px;"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    @if ($page == 'products')
                        <li class="nav-item"><a class="nav-link" href="/products" style="color: rgb(255,255,255);font-size: 20px;font-family: Poppins, sans-serif;font-weight: bold;text-decoration: underline;">Produk</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/products" style="color: rgba(255,255,255,0.55);font-size: 20px;font-family: Poppins, sans-serif;font-weight: bold;">Produk</a></li>
                    @endif
                    @if ($page == 'jadwalku')
                    <li class="nav-item"><a class="nav-link" href="/jadwalku" style="color: rgb(255,255,255);font-size: 20px;font-family: Poppins, sans-serif;font-weight: bold;text-decoration: underline;">JadwalKu</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="/jadwalku" style="color: rgba(255,255,255,0.55);font-size: 20px;font-family: Poppins, sans-serif;font-weight: bold;">JadwalKu</a></li>
                    @endif
                    <li class="nav-item">
                    <a class="nav-link" href="/logout" style="color: rgb(255,255,255);font-size: 20px;font-family: Poppins, sans-serif;font-weight: bold;">
                        Logout
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background: #d9d9d9;">
            <ul class="sidebar-nav">
                
                @if ($page == 'home')
                <li class="sidebar-brand"> <a href="/" style="color: rgb(0,0,0);">Home </a></li>
                @else
                <li class="sidebar-brand"> <a href="/" >Home </a></li>
                @endif
                @if ($page == 'bookings')
                <li> <a href="/admin/bookings" style="color: rgb(0,0,0);">Bookings</a></li>
                @else
                <li> <a href="/admin/bookings" >Bookings</a></li>
                @endif
                @if ($page == 'users')
                <li> <a href="/admin/users" style="color: rgb(0,0,0);">Users</a></li>
                @else
                <li> <a href="/admin/users" >Users</a></li>
                @endif
                @if ($page == 'lapang')
                <li> <a href="/admin/lapang" style="color: rgb(0,0,0);">Lapangan</a></li>
                @else
                <li> <a href="/admin/lapang" >Lapangan</a></li>
                @endif
                @if ($page == 'feedbacks')
                <li> <a href="/admin/feedbacks" style="color: rgb(0,0,0);">Feedbacks</a></li>
                @else
                <li> <a href="/admin/feedbacks">Feedbacks</a></li>
                @endif
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="row">
                    <div class="col-md-12">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.min.js')}}"></script>
    <script src="{{ asset('js/Sidebar-Menu.js') }}"></script>
</body>

</html>
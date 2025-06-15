<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sidebar App') }}</title>

    <!-- Fonts & Icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- Bootstrap 4 & jQuery (CDN) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#"><i class="fas fa-bars"></i></a>

        <!-- Sidebar Start -->
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">PHENIKAA UNIVERSITY</a>
                    <div id="close-sidebar"><i class="fas fa-times"></i></div>
                </div>

                <div class="sidebar-header">
                    <div class="user-pic">
                        @if (Auth::check())
                            <img class="img-responsive img-rounded" 
                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('storage/avatars/default.png') }}" 
                                alt="User picture">
                        @else
                            <img class="img-responsive img-rounded" 
                                src="{{ asset('storage/avatars/default.png') }}" 
                                alt="Default avatar">
                        @endif                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>

                <div class="sidebar-search">
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu"><span>General</span></li>

                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="#">Dashboard 1</a></li>
                                    <li><a href="#">Dashboard 2</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-shopping-cart"></i><span>E-commerce</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Orders</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="header-menu"><span>Extra</span></li>
                        @can('profile')
                        <li><a href="{{ route('profile.show') }}"><i class="fa fa-users-circle"></i> Profile</a></li>
                        @endcan
                        @can('user-list')
                        <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users</a></li>
                        @endcan
                        @can('role-list')
                        <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-tag"></i> Roles</a></li>
                        @endcan
                        @can('student-list')
                        <li><a href="{{ route('students.index') }}"><i class="fa fa-box"></i> Students</a></li>
                        @endcan

                    </ul>
                </div>
            </div>

            <div class="sidebar-footer">
                <a href="#"><i class="fa fa-bell"></i><span class="badge badge-warning">3</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span class="badge badge-success">7</span></a>
                <a href="#"><i class="fa fa-cog"></i></a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
        <!-- Sidebar End -->

        <!-- Content -->
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    @stack('scripts')
</body>

</html>

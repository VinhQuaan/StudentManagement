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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    body {
        background-image: url('{{ asset('images/bg.jpeg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    </style>
</head>

<body>
@if(Auth::check())
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
                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/default.jpg') }}" 
                                alt="User picture">
                        @else
                            <img class="img-responsive img-rounded" 
                                src="{{ asset('images/default.jpg') }}" 
                                alt="Default avatar">
                        @endif                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
                        <span class="user-role">{{ Auth::user()->getRoleNames()->first() ?? 'Unknown' }}</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu"><span>General</span></li>
                        @can('profile')
                        <li>
                            <a href="{{ route('profile.show') }}">
                                <i class="bi bi-person-circle"></i> Profile
                            </a>
                        </li>
                        @endcan

                        @can('user-list')
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                        @endcan

                        @can('role-list')
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="bi bi-shield-lock"></i> Roles
                            </a>
                        </li>
                        @endcan

                        @role('Student')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.courses.index') }}">
                                <i class="bi bi-journal-bookmark-fill"></i> Courses
                            </a>
                        </li>
                        @endrole

                        @role('Student')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.grades') }}">
                                <i class="bi bi-clipboard2-check-fill"></i> My Grades
                            </a>
                        </li>
                        @endrole

                        @role('Teacher')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.course.index') }}">
                                <i class="bi bi-easel-fill"></i> Courses
                            </a>
                        </li>
                        @endrole

                        @role('Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.courses.index') }}">
                                <i class="bi bi-easel-fill"></i> Courses
                            </a>
                        </li>
                        @endrole

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
            <div class="container content-container" style="margin-left: 300px;">
                @yield('content')
            </div>
        </main>
    </div>
@else
<main class="py-4">
    <div class="container content-container" style="margin-left: 300px;">
        @yield('content')
    </div>
</main>
@endif
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

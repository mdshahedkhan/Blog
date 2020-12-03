<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')| Blog SS-IT</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/frontend/css/blog-home.css') }}" rel="stylesheet">
    <style>
        .w-5{
            height: 12px;
        }
        .justify-between{
            margin-bottom: 10px;
        }
        .relative{
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a href=""><img src="{{ asset('/') }}upload/Profile/{{ auth()->User()->image }}" style="width: 40px; height: 40px; margin-left: 8px; border-radius: 50%; border: 3px solid #ffc107" alt=""></a>
                    </li>
                    <li class="nav-item active">
                        <a href="" class="nav-link">Hi {{ Auth::User()->name }}</a>
                    </li>
                @endauth
                <li class="nav-item {{ request()->is('/') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('index') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('single-post') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('single-post') }}">Single Post</a>
                </li>
                @guest
                    <li class="nav-item {{ request()->is('user/login') ? 'active':'' }}">
                        <a class="nav-link" href="{{ route('user.loginShow') }}">Login</a>
                    </li>
                    <li class="nav-item {{ request()->is('user/register') ? 'active':'' }}">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
                        {{--<form action="{{ route('user.logout') }}" method="get">
                            <input type="submit" class="btn btn-danger" value="Logout">
                        </form>--}}
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <br>

            @yield('content')


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the
                    new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

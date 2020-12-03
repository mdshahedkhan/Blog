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
    <link href="{{ asset('assets/admin/summernote/summernote.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/toggle/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <style>
        .w-5{
            height: 12px;
        }
        .justify-between{
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Start Bootstrap</a>
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
                        <a href="" class="nav-link">Hi {{ strstr(Auth::User()->name,' ', true) }}</a>
                    </li>
                @endauth
                <li class="nav-item {{ request()->is('admin/dashboard') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('index') }}">Home<span class="sr-only">(current)</span>
                    </a>
                </li>
                    <div class="dropdown mr-2">
                        <a class="btn nav-link {{ request()->is('admin/category/*') ? 'active':'' }} dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('admin.category.add-category') }}">Add Category</a>
                            <a class="dropdown-item" href="{{ route('admin.category.manage-category') }}">Manage Category</a>
                        </div>
                    </div>
                    <div class="dropdown mr-2">
                        <a class="btn nav-link dropdown-toggle {{ request()->is('admin/post/*') ? 'active':'' }}" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('admin.post.add') }}">Add Post</a>
                            <a class="dropdown-item" href="{{ route('admin.post.manage') }}">Manage Post</a>
                        </div>
                    </div>
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
        <div class="col-md-12 m-auto">
            <br>
            @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
       @yield('sidebar')

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
<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}" type="text/javascript" language="javascript"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/toggle/bootstrap-toggle.min.js') }}" type="text/javascript" language="javascript"></script>
<script src="{{ asset('assets/admin/summernote/summernote.js') }}" type="text/javascript"></script>
<script>

    $(document).ready(function (){
        /*$('.summernote').summernote();*/
        $('body').on('change','#CategoryStatus',function (){
            let id = $(this).attr('data-id')
            var status = this.checked ? 'active':'inactive';
            $.ajax({
                url: 'manage-category'+'/'+id+'/'+status,
                method: 'get',
                success: function (result){
                    console.log(result)
                }
            })
        });
        $('body').on('change','#PostStatus',function (){
            let id = $(this).attr('data-id')
            var status = this.checked ? 'active':'inactive';
            $.ajax({
                url: 'manage'+'/'+id+'/'+status,
                method: 'get',
                success: function (result){
                    console.log(result)
                }
            })
        });
    });
</script>

</body>

</html>

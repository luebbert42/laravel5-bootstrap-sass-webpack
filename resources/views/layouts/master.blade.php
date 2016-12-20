<!DOCTYPE html>
<html lang="en">
<head>
    @include("layouts.partials._head")
</head>
<body>
<div id="app">

    @include("layouts.partials._nav")

    <div class="container-fluid main-container">
        <div class="col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div>


        <div class="col-md-10 content">


            @include("layouts.partials._breadcrumb")


            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield("title")
                </div>
                <div class="panel-body">

                    @if (session('flash_message'))
                        <div class="alert alert-success alert-icon" role="alert">
                            <i class="fa fa-check"></i>
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success alert-icon" role="alert">
                            <i class="fa fa-check"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-danger alert-icon" role="alert" id="backend_error_msg" style="display:none">
                        <i class="fa fa-check"></i>
                    </div>

                    <div class="alert alert-success alert-icon" role="alert" id="backend_success_msg"
                         style="display:none">
                        <i class="fa fa-check"></i>
                    </div>

                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</div>

<footer  id="footer" class="navbar-fixed-bottom">
    <p class="h5 text-muted">Awesome Footer</p>
</footer>

<script src="{{asset('js/app.js')}}?v={{$version}}"></script>
@yield('js')
</body>
</html>
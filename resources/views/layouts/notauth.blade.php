<!DOCTYPE html>
<html lang="en">
<head>
    @include("layouts.partials._head")
    <link href="{{asset('css/login/login.css')}}?v={{$version}}" rel="stylesheet">
</head>
<body class="login">

<div id="app" class="container" style="margin-top:10%">
    <div class="col-md-4 col-md-offset-4">
        @yield('content')</div>
</div>
</div>

<script src="{{asset('js/app.js')}}?v={{$version}}"></script>
@yield('js')
</body>
</html>
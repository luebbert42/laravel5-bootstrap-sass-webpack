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
@if ( Config::get('app.debug') )
    <script type="text/javascript">
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script>
@endif
</body>
</html>
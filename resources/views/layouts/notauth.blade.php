<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Timetracker</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/login/login.css')}}" rel="stylesheet">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>
<body class="login">

<div class="container" style="margin-top:10%">
    <div class="col-md-4 col-md-offset-4">
        @yield('content')</div>
</div>
</div>

<script src="{{asset('js/all.js')}}"></script>
</body>
</html>
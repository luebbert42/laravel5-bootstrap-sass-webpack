<!DOCTYPE html>
<html lang="en">
<head>
    @include("layouts.partials._head")
</head>
<body>
<div class="wrapper">

    @include("layouts.partials._nav")

    <section class="section">
        <div class="container">
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

            <div class="alert alert-success alert-icon" role="alert" id="backend_success_msg" style="display:none">
                <i class="fa fa-check"></i>
            </div>
            @yield("content")
        </div>
    </section>


</div>

<script src="{{asset('js/all.js')}}?v={{$version}}"></script>
@yield('js')
</body>
</html>
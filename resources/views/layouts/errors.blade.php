<!DOCTYPE html>
<html class="layout-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{$appName}}</title>
    @include("layouts.partials._head")
</head>
<body>

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">


    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container jumbotron light-gray-bg text-center margin-clear">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->

                @yield('content')
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->



</div>
<!-- page-wrapper end -->
</body>
</html>

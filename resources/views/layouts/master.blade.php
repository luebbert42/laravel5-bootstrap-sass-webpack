<!DOCTYPE html>
<html lang="en">
<head>
    @include("layouts.partials._head")
</head>
<body>
<div id="app">

    @include("layouts.partials._nav")


    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Firmenname</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Suche" aria-label="Suche">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar navbar-left">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('home')}}">
                                Home <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.index')}}">
                                Benutzer
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">  @yield("title")</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Foo</button>
                            <button class="btn btn-sm btn-outline-secondary">Bar</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            SomethingElse
                        </button>
                    </div>
                </div>
                @yield("content")



            </main>
        </div>
    </div>

</div>


<script src="{{asset('js/app.js')}}?v={{$version}}"></script>
@yield('js')
</body>
</html>
<header id="header" class="navbar navbar-dark bg-dark">
    <div class="app--navbar-logo">
        Company
    </div>

    <a href="{{route("auth.logout")}}" class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>


</header>
<div class="col-md-2 sidebar">
    <ul class="nav nav-pills nav-stacked">
        <li class = "{{ strstr(Route::currentRouteName(),"home") ?  'active' : '' }}">
            <a href="{{route("home")}}">Home</a>
        </li>
        @if(Auth::user()->can('admin_users'))
            <li class = "{{ strstr(Route::currentRouteName(),"users") ?  'active' : '' }}">
                <a href="{{route("users.index")}}">Benutzer</a>
            </li>
        @endif
    </ul>
</div>

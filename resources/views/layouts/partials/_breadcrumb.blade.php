    <!-- .breadcrumb -->
    <ul class="breadcrumb">
        <li><a href="{{route("home")}}"><i class="fa fa-home"></i> Home</a></li>
        @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
            @foreach($breadcrumbs as $route => $label)
                @if ($label == end($breadcrumbs))
                    <li class="active" >
                        {{$label}}
                    </li>
                 @else
                    <li >
                        <a href="{{$route}}">{{$label}}</a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
    <!-- / .breadcrumb -->
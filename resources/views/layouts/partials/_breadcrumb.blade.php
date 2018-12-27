    <!-- .breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("home")}}"><i class="fa fa-home"></i> Home</a></li>
            @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
                @foreach($breadcrumbs as $route => $label)
                    @if ($label == end($breadcrumbs))
                        <li class="active breadcrumb-item" aria-current="page">
                            {{$label}}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{$route}}">{{$label}}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ol>
    </nav>
    <!-- / .breadcrumb -->
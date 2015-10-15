@extends('layouts.errors')

@section('content')
<div class="main col-md-6 col-md-offset-3 pv-40">
    <h1 class="page-title"><span class="text-default">404</span></h1>
    <h2>Ooops! Page Not Found</h2>
    <p>The requested URL was not found on this server. Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</p>

    <a href="{{ URL::route('home') }}" class="btn btn-default btn-animated btn-lg"> Home <i class="fa fa-home"></i></a>
</div>
@stop
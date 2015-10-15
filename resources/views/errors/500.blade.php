@extends('layouts.errors')


@section('content')
    <div class="main col-md-6 col-md-offset-3 pv-40">
        <h1 class="page-title"><span class="text-default">500</span></h1>
        <h2>Sorry! It's not you. It's us.</h2>
        <p>We are experiencing an internal server problem. Please try again later and contact the support if the problem recurs.</p>
        <a href="{{ URL::route('home') }}" class="btn btn-default btn-animated btn-lg"> Home <i class="fa fa-home"></i></a>
    </div>
@stop
@extends('layouts.master')


@section("title")
    Pogo-Fake Daten generieren
@stop


@section('content')


    <ul>
        <li><a href="{{route("pogo.generate", ["num" => 1])}}">1</a> </li>
            <li><a href="{{route("pogo.debug", ["num" => 1])}}">1 Debug</a></li>
        <li><a href="{{route("pogo.generate", ["num" => 10])}}">10</a></li>
        <li><a href="{{route("pogo.debug", ["num" => 10])}}">10 Debug</a></li>
    </ul>

@stop
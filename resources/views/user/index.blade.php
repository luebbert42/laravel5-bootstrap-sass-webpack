@extends('layouts.master')


@section('title')
    Users
@stop

@section('content')

    <p>
        <a href="{{route('users.create')}}" class="btn btn-primary btn-small">New user</a>
    </p>


    {!! Form::model( $search, ['class' => 'form-horizontal',
                          'method' => 'POST',
                          "name" => "searchusers",
                          'route' => [ \Route::currentRouteName() ]
                          ] ) !!}
    @include('user._form_search', [])
    {{ Form::close() }}

    @include('user._list', [])

@stop
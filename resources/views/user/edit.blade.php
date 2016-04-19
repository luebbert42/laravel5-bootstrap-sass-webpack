@extends('layouts.master')

@section('pagetitle', 'Benutzer editieren')

@section('title')
     @include("layouts.partials._title", array("icon" => "fa-user", "title" => "Benutzer editieren"))
@stop


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <div class="panel-body">
                    <h4>Benutzer editieren</h4>
                    {!! Form::model( $user, ['class' => 'form-horizontal',
                                                 'method' => 'PATCH',
                                                 'route' => ['admin.users.update', $user->id]
                                                 ] ) !!}
                    @include('layouts.partials._error_msg')
                    @include('user._form_create', array(
                        "user" => $user,
                    ))
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>


@stop
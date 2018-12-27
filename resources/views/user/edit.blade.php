@extends('layouts.master')

@section('pagetitle', 'Benutzer editieren')

@section('title')
     @include("layouts.partials._title", array("icon" => "fa-user", "title" => "Edit user"))
@stop


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <div class="panel-body">
                    {!! Form::model( $user, ['class' => 'form-horizontal',
                                                 'method' => 'PATCH',
                                                 'route' => ['users.update', $user->id]
                                                 ] ) !!}
                    @include('layouts.partials._error_msg')
                    @include('user._form_create', array(
                        "user" => $user,
                        "roles" => $roles,
                        "userRole" => $user->roles()->first()->role_slug,
                    ))
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>


@stop
@extends('layouts.master')

@section('pagetitle', 'Neuer Benutzer')

@section('title')
    @include("layouts.partials._title", array("icon" => "fa-user", "title" => "Neuen Benutzer anlegen"))
@stop


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <div class="panel-body">
                    <h4>Neuer Benutzer</h4>

                    <form class="form-horizontal" method="post" action="{{ URL::route('users.store') }}">
                        @include('layouts.partials._error_msg')
                        @include('user._form_create',
                                array(
                                "user" => $user,
                                "roles" => $roles,
                                "userRole" => null,
                            )
                        )
                    </form>
                </div>
            </section>
        </div>
    </div>


@stop
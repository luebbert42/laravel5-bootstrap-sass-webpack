@extends('layouts.master')


@section('content')


    <h1>Users</h1>
    <div>
        <div class="row">
            @foreach($users as $user)

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="app--list-item app--user-list-item">
                        <div class="app--user-list-name ellipsis">
                            <i class="fa fa-user pr-5"></i> {{$user->firstname}}  {{$user->lastname}}
                        </div>

                        <dl class="app--key-value-list app--lead-5 clearfix">
                            <dt>Email:</dt>
                            <dd><a href="mailto:{{$user->email}}"> {{$user->email}}</a></dd>
                            <dt>Role:</dt>
                            <dd>@foreach($user->roles()->get() as $role)
                                    {{ $role->role_title}}
                                @endforeach
                            </dd>
                        </dl>

                        <ul class="app--inline-list app--inline-list-left">
                            <li>
                                <a href="#"><i class="fa fa-pencil pr-5"></i>Edit</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-power-off pr-5"></i>Deactivate</a>
                            </li>
                        </ul>
                    </div>
                </div>

            @endforeach

        </div>
    </div>


@stop
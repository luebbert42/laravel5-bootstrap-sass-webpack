@extends('layouts.master')


@section('content')


    <h1>Users</h1>
    <div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped b-t text-small" id="table-app-users-index" >
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{route("admin.users.edit", array("id" => $user->id))}}">{{$user->firstname}}  {{$user->lastname}}</a></td>
                            <td><a href="mailto:{{$user->email}}"> {{$user->email}}</a>
                            </td>
                            <td>
                                @foreach($user->roles()->get() as $role)
                                    {{ $role->role_title}}
                                @endforeach
                            </td>
                            <td>
                                @yesno($user->active)
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
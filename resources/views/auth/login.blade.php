@extends('layouts.notauth')

@section('content')

    <div class="panel member_signin">
        <div class="panel-body">
            <div class="fa_user">
                <i class="fa fa-user"></i>
            </div>
            <p class="member">{{$appName}}</p>

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form role="form" class="loginform" id="loginform" method="post" action="{{ url('/login') }}">
                {!! Form::token() !!}
                <div class="form-group">
                    <label for="email" class="sr-only">Email-Adresse</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="Email-Adresse">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Passwort</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Passwort">
                    </div>
                </div>
                <button type="submit" class="btn btn-brown btn-md login">Anmelden</button>
            </form>
            <p class="forgotpass"><a href="{{ url('/password/reset') }}" class="small">Passwort vergessen?</a></p>
        </div>
    </div>
@stop
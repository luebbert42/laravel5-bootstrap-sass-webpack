@extends('layouts.notauth')

@section('content')

    <div class="panel member_signin">
        <div class="panel-body">
            <div class="fa_user">
                <i class="fa fa-user"></i>
            </div>
            <p class="member">Neues Passwort festlegen</p>

            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form role="form" class="loginform" method="post" action="{{ URL::route('password.postReset') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="token" value="{{ $token }}">
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
                <div class="form-group">
                    <label for="password" class="sr-only">Passwort</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password"
                               placeholder="Passwort">
                    </div>
                </div>
                <button type="submit" class="btn btn-brown btn-md login">Passwort ändern</button>
            </form>
            <p class="forgotpass"><a href="{{ URL::route('auth.getLogin') }}" class="small">Login</a></p>
        </div>
    </div>

@endsection
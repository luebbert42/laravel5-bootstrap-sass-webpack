@extends('layouts.notauth')

@section('content')

    <div class="panel member_signin">
        <div class="panel-body">
            <div class="fa_user">
                <i class="fa fa-user"></i>
            </div>
            <p class="member">Passwort vergessen?</p>

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
            <form role="form" class="loginform" method="post" action="{{ URL::route('password.email') }}">
                {!! Form::token() !!}
                <div class="form-group">
                    <label for="email" class="sr-only">Email-Adresse</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="Email-Adresse">
                    </div>
                </div>

                <button type="submit" class="btn btn-brown btn-md login">Neues Passwort anfordern</button>
            </form>
            <p class="forgotpass"><a href="{{ URL::route('auth.getLogin') }}" class="small">Login</a></p>
        </div>
    </div>



@endsection
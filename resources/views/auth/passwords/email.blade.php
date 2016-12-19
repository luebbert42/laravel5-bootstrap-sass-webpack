@extends('layouts.notauth')

<!-- Main Content -->
@section('content')
    <div class="panel member_signin">
        <div class="panel-body">
            <div class="fa_user">
                <i class="fa fa-user"></i>
            </div>
            <p class="member">Passwort vergessen?</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

            <form role="form" class="loginform" method="post" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="sr-only">Email-Adresse</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="Email-Adresse" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </div>
                <button type="submit" class="btn btn-brown btn-md login">Neues Passwort anfordern</button>
            </form>
        <p class="forgotpass"><a href="{{ url('login') }}" class="small">Login</a></p>
        </div>
    </div>
@endsection

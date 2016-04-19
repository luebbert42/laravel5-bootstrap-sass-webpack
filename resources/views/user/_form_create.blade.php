{!! Form::token() !!}
<div class="form-group">
    {!! Form::label('firstname', 'Vorname:', ['class' => 'control-label col-lg-3']) !!}
    <div class="col-lg-8">
        {!! Form::text('firstname', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Nachname:', ['class' => 'control-label col-lg-3']) !!}
    <div class="col-lg-8">
        {!! Form::text('lastname', null, ['class' => 'form-control',   'required' => '', 'maxlength' => '255']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-Mail:', ['class' => 'control-label col-lg-3']) !!}
    <div class="col-lg-8">
        {!! Form::email('email', null, ['class' => 'form-control',  'required' => '', 'maxlength' => '255']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role_slug', 'Rolle:', ['class' => 'control-label col-lg-3']) !!}
    <div class="col-lg-8">
        {!! Form::select('role_slug', [null=> $please_select] + $roles, $userRole,
        [
            'class' => 'form-control',
            'required' => ''
        ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('active', 'aktiv:', ['class' => 'control-label col-lg-3']) !!}
    <div class="col-lg-8">
        {!! Form::select('active', [null=> $please_select] + array(1 => "aktiv", 0 => "inaktiv"), $user->active,
        [
            'class' => 'form-control',
            'required' => ''
        ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary">Speichern</button>
    </div>
</div>
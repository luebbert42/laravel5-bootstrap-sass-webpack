<div class="panel-heading  filter-users" id="filter-users">
    <div class="row">

        <div class="col-lg-4">
            <div class="form-group"><label
                        class="col-lg-4 control-label">Vorname</label>
                <div class="col-lg-8">
                    {!! Form::text('firstname', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"><label
                        class="col-lg-4 control-label">Name</label>
                <div class="col-lg-8">
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"><label
                        class="col-lg-4 control-label">E-Mail</label>
                <div class="col-lg-8">
                    {!! Form::text('email', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <resetform formname="searchusers"></resetform>
            <button class="btn btn-sm btn-primary">Suchen</button>
        </div>
    </div>

</div>

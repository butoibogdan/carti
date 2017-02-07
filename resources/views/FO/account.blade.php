@extends('FO.index')

@section('content')
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
            <li><a data-toggle="tab" href="#menu1">Change Password</a></li>
            <li><a data-toggle="tab" href="#menu2">Details</a></li>
        </ul>

        <div class="tab-content">

            <div id="home" class="tab-pane fade in active">
                {!! Form::open(['url' => '/changeaccount/overview', 'class' => 'form-horizontal', 'files' => true]) !!}
                <br/><br/>
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('email', Auth::user()->email, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-8">
                            {!! Form::submit('Modifica', ['class' => 'btn btn-block btn-success btn-sm']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>


            <div id="menu1" class="tab-pane fade">
                {!! Form::open(['url' => '/changeaccount/password', 'class' => 'form-horizontal', 'files' => true]) !!}
                <br/><br/>
                <div class="form-group {{ $errors->has('old_password') ? 'has-error' : ''}}">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {!!Form::password('old_password',['class'=>'form-control','placeholder'=>'Old Password']) !!}
                        {!! $errors->first('old_password', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Retype password']) !!}
                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-xs-offset-8">
                        {!! Form::submit('Modifica', ['class' => 'btn btn-block btn-success btn-sm']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            
            <div id="menu2" class="tab-pane fade">
                <br/><br/>
               Last Login:  {{Auth::user()->last_login}}
            </div>
            
        </div>
    </div>
</div>
@endsection
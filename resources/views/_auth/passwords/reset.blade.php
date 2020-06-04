@extends('layouts.app')
@section('title')
    Reset password
@endsection
@section('content')
    <!-- BEGIN RESET PASSWORD FORM -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(['url'=>'/password/reset','class'=>'login-form', 'method'=>'POST'])!!}
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            {{ Form::email('email', old('email'), ['id'=>'email', 'class'=>'form-control placeholder-no-fix', 'placeholder'=>'Email','autocomplete'=>'off']) }}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            {{ Form::password('password', ['id'=>'password', 'class'=>'form-control  placeholder-no-fix','placeholder'=>'Password','autocomplete'=>'off']) }}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <div class="input-icon">
            <i class="fa fa-check"></i>
            {{ Form::password('password_confirmation', ['id'=>'password-confirm', 'class'=>'form-control placeholder-no-fix','placeholder'=>'Retype Password','autocomplete'=>'off']) }}
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-actions" style="margin-left: 15%">
        {!! Form::submit('Reset password',['class'=>'btn green']) !!}
    </div>
    {!! Form::close() !!}
    <!-- END RESET PASSWORD FORM -->
@endsection
@section('footer')




@endsection
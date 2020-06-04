@extends('layouts.app')
@section('title')

register
@endsection
@section('content')
    <!-- BEGIN REGISTRATION FORM -->
    {!! Form::open(['url'=>'register' ,'class'=>'login-form' ,'method'=>'post']) !!}
    <h3>Sign Up</h3>
    <p> Enter your personal details below: </p>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter valid information . </span>
    </div>
    <div class="form-group{{ $errors->has('UserName') ? ' has-error' : '' }}">
        <div class="input-icon">
            <i class="fa fa-font"></i>
            {!! Form::text('UserName',old('UserName'),['class'=>'form-control placeholder-no-fix','placeholder'=>'User Name','autocomplete'=>'off']) !!}
            @if ($errors->has('UserName'))
                <span class="help-block">
                    <strong>{{ $errors->first('UserName') }}</strong>
                </span>
            @endif

        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <div class="input-icon">
          <i class="fa fa-envelope"></i>
          {!! Form::email('email',old('email'),['class'=>'form-control placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off']) !!}
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
            {!! Form::password('password',['class'=>'form-control placeholder-no-fix', 'id'=>'password' ,'placeholder'=>'Password','autocomplete'=>'off']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="controls">
            <div class="input-icon">
                <i class="fa fa-check"></i>
                {!! Form::password('password_confirmation',['class'=>'form-control placeholder-no-fix','placeholder'=>'Re-type Your Password','autocomplete'=>'off']) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color:#E73D4A">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" value="1" />
            <input type="checkbox" name="tnc" /> I agree to the
            <a href="javascript:;" style="color: #d2100c;">Terms of Service </a> &
            <a href="javascript:;" style="color: #d2100c;">Privacy Policy </a>
            <span></span>
        </label>
    </div>
    <div class="form-actions">
        <a id="register-back-btn" class="btn red btn-outline" href="{{url('/')}}"> Back</a>
           <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up </button>
    </div>
    {!! Form::close() !!}
@endsection
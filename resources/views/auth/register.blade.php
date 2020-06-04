@extends('layouts.app')
@section('title')
{{__('site.register')}}
@endsection
@section('content')
    <!-- BEGIN REGISTRATION FORM -->
    {!! Form::open(['url'=>'register' ,'class'=>'login-form' ,'method'=>'post']) !!}
    <h3>{{__('site.signUp')}}</h3>
    <p> {{__('site.enterDetails')}} </p>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> {{__('site.validInformation')}} </span>
    </div>
    <div class="form-group{{ $errors->has('UserName') ? ' has-error' : '' }}">
        <div class="input-icon">
            <i class="fa fa-font"></i>
            {!! Form::text('UserName',old('UserName'),['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.userName'),'autocomplete'=>'off']) !!}
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
          {!! Form::email('email',old('email'),['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.email'),'autocomplete'=>'off']) !!}
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
            {!! Form::password('password',['class'=>'form-control placeholder-no-fix', 'id'=>'password' ,'placeholder'=>__('site.password'),'autocomplete'=>'off']) !!}
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
                {!! Form::password('password_confirmation',['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.retypePassword'),'autocomplete'=>'off']) !!}
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
            <input type="checkbox" name="tnc" /> {{__('site.agree')}}
            <a href="javascript:;" style="color: #d2100c;">{{__('site.termsOfServices')}} </a> &
            <a href="javascript:;" style="color: #d2100c;">{{__('site.privacyPolicy')}} </a>
            <span></span>
        </label>
    </div>
    <div class="form-actions">
        <a id="register-back-btn" class="btn red btn-outline" href="{{url('/')}}"> {{__('site.back')}}</a>
        @if(app()->getLocale() == 'en')
           <button type="submit" id="register-submit-btn" class="btn green pull-right">{{__('site.signUp')}} 
           </button>
        @else
        <button type="submit" id="register-submit-btn" class="btn green pull-left">{{__('site.signUp')}} 
           </button>
        @endif
    </div>
    {!! Form::close() !!}
    <hr>
    <h4>{{__('site.orRegisterUsing')}}</h4>
    <div class="form-group row mb-0">
     <div class="col-md-8 offset-md-4">
        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> </a>
    </div>
    </div>
@endsection
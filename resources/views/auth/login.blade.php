@extends('layouts.app')
@section('title')
{{__('site.login')}}
@endsection
@section('content')
    <!-- BEGIN LOGIN FORM -->
    {!! Form::open(['url'=>'login','class'=>'login-form' ,'method'=>'post']) !!}
        <h3 class="form-title">{{__('site.loginToAccount')}}</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> {{__('site.validMail')}} </span>
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
                {!! Form::password('password',['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.password'),'autocomplete'=>'off']) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
        </div>
        <div class="form-actions">
            {!! Form::checkbox(__('site.rememberMe'),old('password')) !!}
             {!! Form::label(__('site.rememberMe')) !!}
            <span></span>
            @if(app()->getLocale() == 'en')
                {!! Form::submit(__('site.login'),['class'=>'btn green pull-right']) !!}
            @else
                {!! Form::submit(__('site.login'),['class'=>'btn green pull-left']) !!}
            @endif
        </div>
        <div class="login-options">
            <h4>{{__('site.loginWith')}}</h4>
            <ul class="social-icons">
                <li>
                    <a class="facebook" data-original-title="facebook" href="{{ url('auth/facebook') }}"> </a>
                </li>

            </ul>
        </div>
        <div class="forget-password">
            <h4>{{__('site.forgotPassword')}}</h4>
            <p> {{__('site.noWorries')}}
                <a href="{{ url('/password/reset') }}" id="forget-password" style="color: #d2100c;"> {{__('site.here')}} </a> {{__('site.toReset')}} </p>
        </div>
    {!! Form::close() !!}
    <!-- END LOGIN FORM -->
    <hr>
        <h4>{{__('site.orLoginUsing')}}</h4>
        <div class="form-group row mb-0">
         <div class="col-md-8 offset-md-4">
            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
        </div>
        </div>
    <div class="create-account">
         <p> {{__('site.donotHaveAccount')}}&nbsp;
             <a   href="{{url('/register')}}" id="register-btn" style="color: #d2100c;"> {{__('site.newAccount')}} </a>
         </p>
    </div>
@endsection

@section('footer')




@endsection
@extends('layouts.app')
@section('title')
    Forgot password
@endsection
<!-- Main Content -->
@section('content')
    <!-- BEGIN FORGOT PASSWORD FORM -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {!! Form::open(['url'=>'password/email','class'=>'login-form', 'method'=>'POST'])!!}
            {{ csrf_field() }}
            <h3>Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    {!! Form::text('email',old('email'),['class'=>'form-control placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                 </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn red btn-outline"><a href="{{url('/')}}">Back </a></button>
                <button type="submit" class="btn green pull-right"> Submit </button>
            </div>
        {!! Form::close() !!}
    <!-- END FORGOT PASSWORD FORM -->
@endsection
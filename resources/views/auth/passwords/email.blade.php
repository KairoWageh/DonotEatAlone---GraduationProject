@extends('layouts.app')
@section('title')
    {{__('site.reset')}}
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
            <h3>{{__('site.forgotPassword')}}</h3>
            <p> {{__('site.enterEmail')}} </p>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    {!! Form::text('email',old('email'),['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.email'),'autocomplete'=>'off']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                 </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn red btn-outline"><a href="{{url('/')}}">{{__('site.back')}} </a></button>
                @if(app()->getLocale() == 'en')
                    <button type="submit" class="btn green pull-right"> {{__('site.submit')}} </button>
                @else
                    <button type="submit" class="btn green pull-left"> {{__('site.submit')}} </button>
                @endif
            </div>
        {!! Form::close() !!}
    <!-- END FORGOT PASSWORD FORM -->
@endsection
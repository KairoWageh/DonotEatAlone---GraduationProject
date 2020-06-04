@extends('users.layouts.layout')
@section('title')
{{__('site.profile')}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="../public/uploads/{{Auth::user()->UserPhoto}}" style="border-radius:50%;" class="img-responsive" alt=""> 
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{Auth::user()->UserName}}</div>
                    <div class="profile-usertitle-job"> {{Auth::user()->UserJob}} </div>
                    <div class="profile-usertitle-name">  {{Auth::user()->UserAge}}</div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
    </div>
    <!-- BEGIN PROFILE CONTENT -->
    <div class="col-md-9">
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">{{__('site.profileAccount')}}</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">{{__('site.personalInfo')}}</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">{{__('site.changeAvatar')}}</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">{{__('site.changePassword')}}</a>
                                </li>
                                <li>
                                    <a href="#tab_1_4" data-toggle="tab">{{__('site.privacySettings')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    {!! Form::open(['url'=>'profile/'.Auth::user()->id,'class'=>'login-form' ,'method'=>'post']) !!}
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="control-label">{{__('site.name')}}</label>
                                        {!! Form::text('UserName',Auth::user()->UserName,['class'=>'form-control placeholder-no-fix']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{__('site.mobileNumber')}}</label>
                                        {!! Form::text('UserPhone',Auth::user()->UserPhone,['class'=>'form-control placeholder-no-fix']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{__('site.interests')}}</label>
                                        {!! Form::text('UserInterests',Auth::user()->UserInterests,['class'=>'form-control placeholder-no-fix']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{__('site.job')}}</label>
                                        {!! Form::text('UserJob',Auth::user()->UserJob,['class'=>'form-control placeholder-no-fix']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{__('site.aboutMe')}}</label>
                                        {!! Form::textarea('UserAbout',Auth::user()->UserAbout,['class'=>'form-control placeholder-no-fix']) !!}
                                    </div>
                                    <div class="margin-top-10">
                                        {!! Form::submit(__('site.save'),['class'=>'btn green ']) !!}
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">

                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. 
                                    </p>
                                    {!! Form::open( ['url'=>'upload/'.Auth::user()->id,'method'=>'post','id'=>'form_sample_2', 'novalidate'=>'novalidate','enctype'=>'multipart/form-data','files' => true]) !!}
                                    {!! csrf_field() !!}
                                    <div class="form-group {{ $errors->has('UserPhoto') ? ' has-error' : '' }}">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div>
                                              <span class="btn default btn-file">
                                              <span class="fileinput-new"> </span>
                                              <span class="fileinput-exists">  </span>
                                              {!! Form::file('UserPhoto') !!}
                                              @if ($errors->has('UserPhoto'))
                                              <span class="help-block">
                                              <strong>{{ $errors->first('UserPhoto') }}</strong>
                                              </span>
                                              @endif
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                     <div class="margin-top-10">
                                        {!! Form::submit(__('site.save'),['class'=>'btn green ']) !!}
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    {!! Form::open( ['url'=>'editPassword/'.Auth::user()->id,'method'=>'post','id'=>'form_sample_2', 'novalidate'=>'novalidate','enctype'=>'multipart/form-data']) !!}
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
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <div class="controls">
                                            <div class="input-icon">
                                                <i class="fa fa-check"></i>
                                                {!! Form::password('password_confirmation',['class'=>'form-control placeholder-no-fix','placeholder'=>__('site.reTypePassword'),'autocomplete'=>'off']) !!}
                                                @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                     <div class="margin-top-10">
                                        {!! Form::submit(__('site.changePassword'),['class'=>'btn green ']) !!}
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    <form action="#">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                <td>
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option1" /> {{__('site.yes')}}
                                                        <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option2" checked/> {{__('site.no')}}
                                                        <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->
                                        <div class="margin-top-10">
                                            <a href="javascript:;" class="btn red"> {{__('site.saveChanges')}} </a>
                                            <a href="javascript:;" class="btn default"> {{__('site.cancel')}} </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
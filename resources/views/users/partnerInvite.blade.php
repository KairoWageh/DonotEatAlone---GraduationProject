@extends('users.layouts.layout')
@section('title')
{{__('site.findPartner')}}
@endsection
@section('header')
{!! Html::style('public/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
{!! Html::style('public/assets/global/plugins/select2/css/select2.min.css') !!}
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::style('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}
{!! Html::style('public/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
{!! Html::style('public/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
{!! Html::style('public/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
{!! Html::style('public/assets/global/plugins/clockface/css/clockface.css') !!}
<!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
<!--   start search for partner  -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">{{__('site.findPartner')}}</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['url'=>'findPartner','method'=>'get']) !!}
                <div class="form-group col-sm-6">
                    <label>{{__('site.city')}}</label>
                    {!! Form::select("UserCity",UserCity(), null ,['class' =>'form-control select2 input-large select2-hidden-accessible']) !!}    
                </div>
                <div class="form-group col-sm-6">
                    <label>{{__('site.gender')}}</label>
                    {!! Form::select("Gender",Gender(), null ,['class' =>'form-control select2 input-large select2-hidden-accessible']) !!}
                </div>
                <div class="form-group col-sm-12">
                    <label>{{__('site.age')}}</label>
                    <label>{{__('site.from')}}:</label>
                    {!! Form::select("ageFrom",Age(), null ,['class' =>'form-control select2 input-large select2-hidden-accessible']) !!}
                    <label>{{__('site.to')}}:</label>
                    {!! Form::select("ageTo",Age(), null ,['class' =>'form-control select2 input-large select2-hidden-accessible']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::submit(__('site.findPartner') ,['class'=>'btn btn-circle green'] ) !!}    
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--   end search for partner  -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-body">
                <div class="mt-element-card mt-card-round mt-element-overlay">
                    <div class="row">
                        @if(count($foundPartners)>0)
                        @foreach($foundPartners as $partner)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="mt-card-item">
                                <div class="mt-card-avatar mt-overlay-1">
                                    <img  class="img-responsive" src="{{asset('public/uploads')}}/{{$partner->UserPhoto}}" style="height: 154px">
                                </div>
                                <div class="mt-card-content">
                                    <a href="{{url('/profile/'. $partner->id )}}">
                                        <h3 class="mt-card-name">{{$partner->UserName}}</h3>
                                    </a>
                                    <p class="mt-card-desc font-grey-mint">{{__('site.'.$partner->UserCity)}},{{$partner->UserAge}} ,{{$partner->UserJob}} </p>
                                    <a id="invite" class="btn green btn-outline sbold uppercase" href="#form_modal2" data-toggle="modal"> {{__('site.invite')}}
                                    </a>
                        <input type="hidden" value="{{$partner->id}}" name="InvitationReceiverId"/>

                                </div>
                            </div>
                        </div>

                        <div id="form_modal2" class="modal fade in" role="dialog" aria-hidden="true" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">{{__('site.invitationDetails')}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['url'=>'invitation','method'=>'post','class'=>'form-horizontal']) !!}
                                        <div class="form-group">
                                            <label class="col-md-4">{{__('site.invitationDate')}}</label>
                                            <div class="col-md-8">
                                                {!! Form::text('InvitationDate',null,['data-date-format'=>'yyyy-mm-dd','data-date-start-date'=>'-0d','class'=>'form-control input-group input-medium date date-picker ' ,'placeholder'=>__('site.invitationDate')]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4">{{__('site.timeRange')}}</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('InvitationStartTime',old('InvitationStartTime'),['class'=>'form-control timepicker timepicker-no-seconds']) !!}
                                                </div>
                                                <div class="input-group">
                                                    <span class="label label-sm label-success"> {{__('site.to')}} </span>
                                                </div>

                                                <div class="input-group">
                                                    {!! Form::text('InvitationEndTime',old('InvitationEndTime'),['class'=>'form-control timepicker timepicker-no-seconds']) !!}
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>

                                        <!--         <div class="form-group">
                                            <label class="control-label col-md-4">Write message</label>
                                            <div class="col-md-8">
                                            <div class="input-group">
                                            {!! Form::textArea('message',old('message'),['class'=>'form-control','placeholder'=>'Enter your Message here.......... ','autocomplete'=>'off']) !!}

                                              </div>
                                              </div>
                                            </div> -->
                                        <div class="form-group">
                                            <label class="col-md-4">{{__('site.selectRestaurant')}}</label>
                                            <div class="col-md-8">
                                                {!! Form::select("RestaurantId",restaurant() ,['class' =>'select2 input-large select2-hidden-accessible','tabindex'=>'-1']) !!}
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$partner->id}}" name="InvitationReceiverId"/>
                                        
                                        {!! Form::submit(__('site.sendInvitation') ,['class'=>'btn green' ] ) !!}
                                        <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">{{__('site.close')}}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class=" alert alert-danger">
                            {{__('site.noPartnerFound')}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{$foundPartners->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('.send').on('click', function (event) {
        event.preventDefault();
        var id = $('input[name=InvitationReceiverId]').val();
        $.ajax({
            method: 'GET',
            url: 'invitation',
            data: {
                InvitationReceiverId: $('input[name=InvitationReceiverId]').val(),
                InvitationDate: $('input[name=InvitationDate]').val(),
                InvitationStartTime: $('input[name=InvitationStartTime]').val(),
                InvitationEndTime: $('input[name=InvitationEndTime]').val(),
                RestaurantId: $('input[name=RestaurantId]').val()
            }
        });
    });
</script>
{!! Html::script('public/assets/global/plugins/select2/js/select2.full.min.js') !!}
{!! Html::script('public/assets/pages/scripts/components-select2.min.js') !!}
{!! Html::script('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
{!! Html::script('public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
<!-- {!! Html::script('public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!} -->
{!! Html::script('public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}
{!! Html::script('public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('public/assets/pages/scripts/components-date-time-pickers.min.js') !!}
@endsection
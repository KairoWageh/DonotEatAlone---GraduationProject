@extends('users.layouts.layout')
@section('title')
{{__('site.invites')}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green bold uppercase"> {{__('site.invites')}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-card mt-card-round mt-element-overlay">
                    @if(count($invitations)>0)
                        @foreach($invitations as $invite)
                            <div class="row row-{{$invite->InvitationId}}">
                                <div class="mt-actions">
                                    <div class="mt-action">
                                        <div class="mt-action-img">
                                            <img class="img-responsive" src="{{asset('public/uploads')}}/{{$invite->UserPhoto}}"> 
                                        </div>
                                        <div class="mt-action-body">
                                            <div class="mt-action-row">
                                                <div class="mt-action-info ">
                                                    <div class="mt-action-details ">
                                                        <span class="mt-action-author">{{$invite->UserName}}</span>
                                                        <p class="mt-action-desc"> {{$invite->UserName}} Invites you to  {{$invite->RestaurantName}} </p>
                                                    </div>
                                                </div>
                                                <div class="mt-action-datetime ">
                                                    <span class="mt-action-date">{{$invite->InvitationDate}}</span>
                                                    <span class="mt-action-dot bg-green"></span>
                                                    <span class="mt=action-time">{{$invite->InvitationStartTime}}-{{$invite->InvitationEndTime}}</span>
                                                </div>
                                                <div class="mt-action-buttons ">
                                                    <div class="btn-group btn-group-circle">
                                                        <input type="hidden" value="{{$invite->InvitationId}}" name="id">
                                                        <button type="button" id="approve" class="btn btn-outline green btn-sm approve ">{{__('site.approve')}}</button>
                                                        <button type="button" id="reject" class="btn btn-outline red btn-sm reject">{{__('site.reject')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Completed -->
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class=" alert alert-danger">
                        {{__('site.noInvites')}}........
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('.approve').on('click', function (event) {
        event.preventDefault();
        var id = $('input[name=id]').val();
        $.ajax({
            method: 'GET',
            url: 'approveInvitation',
            data: {
                InvitationId: $('input[name=id]').val()
            },
            success: function (data) {

                $(".row-" + id).remove();
            }
        });
    });

$('.reject').on('click', function (event) {
    alert('reject');
    event.preventDefault();
    var id = $('input[name=id]').val();
    $.ajax({
        method: 'GET',
        url: 'rejectInvitation',
        data: {
            InvitationId: $('input[name=id]').val()
        },
        success: function (data) {

            $(".row-" + id).remove();
        }
    });

});


</script>
@endsection

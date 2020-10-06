@extends('users.layouts.layout')
@section('title')
{{__('site.friends')}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">

                    <span class="caption-subject font-green bold uppercase"> {{__('site.myFriends')}}</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-card mt-card-round mt-element-overlay">
                    <div class="row">
                        @if(count($users)>0)
                            @foreach($users as $user)
                                <span style="display: none" id="username">{{ $user->UserName }}</span>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-1" style="height: 20% !important;">
                                            <img src="{{asset('public/uploads')}}/{{$user->UserPhoto}}" style="height: 100%">

                                        </div>
                                        <div class="mt-card-content">
                                            <a href="{{url('/profile/'. $user->id )}}"><h3 class="mt-card-name"></h3>{{$user->UserName}}</a>
                                            <p class="mt-card-desc font-grey-mint">{{$user->UserAge}} years old , {{$user->UserCity}} ,{{$user->UserJob}}.</p>
                                            <!-- <button type="button" class="btn btn-circle green btn-sm" onclick="showMessageForm()">  Message</button> -->
                                            <a href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->UserName }}">Open chat</a>
                                        </div>
                                    </div>
                                 </div>
                                 @include('users/chat-box')
     
                                <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
                                <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
                                <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
                            @endforeach
                        @else
                            <div class=" alert alert-danger">
                                {{__('site.noFriends')}}........
                          </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="chat-popup" id="myForm" style="display: none; position: fixed; bottom: 0; right: 15px; border: 3px solid #f1f1f1; z-index: 9;">
            <div class="form-container" style="max-width: 300px; padding: 10px; background-color: white">
                <div id="chat-window">

                </div>
                <div id="typingStatus" style="padding: 15px"></div>
                <input type="text" placeholder="Type message.." name="msg" id="msg" required autofocus="" onblur="notTyping()" style="width: 100%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1; resize: none;"></input>
                <button type="submit" class="btn" style="background-color: #4CAF50;color: white;padding: 16px 20px;border: none;cursor: pointer;width: 100%;margin-bottom:10px;opacity: 0.8;">Send</button>
                <button type="button" class="btn cancel" style="background-color: #4CAF50;color: white;padding: 16px 20px;border: none;cursor: pointer;width: 100%;margin-bottom:10px;opacity: 0.8;background-color: red" onclick="hideMessageForm()">Close</button>
            </div>
        </div> -->
    </div>
</div>
<!-- <script type="text/javascript">
    function showMessageForm(){
        $("#myForm").css("display", "block");
    }

    function hideMessageForm(){
        $("#myForm").css("display", "none");
    }
</script> -->
@endsection
{{--{!! Html::script('assets/layouts/layout/scripts/jquery-1.11.1.min.js') !!}--}}
{{--{!! Html::script('assets/layouts/layout/scripts/chat.js') !!}--}}

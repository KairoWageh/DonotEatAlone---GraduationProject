@if($message->MessageSenderId == \Auth::user()->id)
 
    <div class="row msg_container base_sent" data-message-id="{{ $message->id }}">
        <div class="col-md-10 col-xs-10">
            <div class="messages msg_sent text-right">
                <p>{!! $message->MessageContent  !!}</p>
                <time datetime="{{ date('Y-m-dTH:i', strtotime($message->created_at)) }}">{{__('site.you')}} • {{ $message->time }}</time>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 avatar">
            <img src="{{asset('public/uploads')}}/{{$message->sender->UserPhoto}}" width="50" height="50" class="img-responsive">
        </div>
    </div>
 
@else
 
    <div class="row msg_container base_receive" data-message-id="{{ $message->id }}">
        <div class="col-md-2 col-xs-2 avatar">
            <img src="{{asset('public/uploads')}}/{{$message->sender->UserPhoto}}" width="50" height="50" class=" img-responsive ">
        </div>
        <div class="col-md-10 col-xs-10">
            <div class="messages msg_receive text-left">
                <p>{!! $message->MessageContent  !!}</p>
                <time datetime="{{ date('Y-m-dTH:i', strtotime($message->created_at)) }}">{{ $message->sender->UserName }} • {{ $message->time }}</time>
            </div>
        </div>
    </div>
 
@endif

<?php
namespace App\Http\Controllers;
 
use App\Lib\PusherFactory;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Carbon\Carbon;
 
class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
 
    /**
     * getLoadLatestMessages
     *
     *
     * @param Request $request
     */
    public function getLoadLatestMessages(Request $request)
    {
        // if request has no user_id return
        if(!$request->user_id) {
            return;
        }
        // if request has user_id
        /* get messages where 
                sender is current user and receiver is user_id
                sender is user_id and receiver is current user
            get latest 10 messages
        */
        $messages = Message::where(function($query) use ($request) {
            $query->where('MessageSenderId', Auth::user()->id)->where('MessageReceiverId', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('MessageSenderId', $request->user_id)->where('MessageReceiverId', Auth::user()->id);
        })->orderBy('id', 'DESC')->limit(10)->get()->reverse();
 //return $messages;
        // empty array to hold fetched messages
        $return = [];
        // mark each message as read
        foreach ($messages as $message) {
            $message->IsRead = 1;
            $message->save(); 
            $message->time = Carbon::parse($message->created_at)->diffForHumans();
            $return[] = view('users/message-line')->with('message', $message)->render();
        }
 
 
        return response()->json(['state' => 1, 'messages' => $return]);
    }

    /**
     * postSendMessage
     *
     * @param Request $request
     */
    public function postSendMessage(Request $request)
    {
        //return $request;
        if(!$request->MessageReceiverId || !$request->message) {
            return;
        }
 
        $user = Auth::user();
        $message = new Message();
        $message->MessageSenderId = Auth::user()->id;
        $message->MessageReceiverId = $request->MessageReceiverId;
        $message->MessageContent  = $request->message;
        $message->IsRead = 0;
        $message->save();
        $message->dateHumanReadable = Carbon::parse($message->created_at)->diffForHumans();

        $message->time = Carbon::parse($message->created_at)->diffForHumans();
        $return[] = view('users/message-line')->with('message', $message)->render();
 
        //exclude the current user from the broadcast's recipients
        broadcast(new MessageSent($user, $message))->toOthers();
 
        PusherFactory::make()->trigger('chat', 'send', ['data' => $message]);
 
        // return response()->json(['state' => 1, 'data' => $message]);
        return response()->json(['state' => 1, 'data' => $return]);
    }

    /**
     * getOldMessages
     *
     * we will fetch the old messages using the last sent id from the request
     * by querying the created at date
     * works when scrolling up
     *
     * @param Request $request
     */
    public function getOldMessages(Request $request)
    {
        if(!$request->old_message_id || !$request->to_user)
            return;
 
        $message = Message::find($request->old_message_id);

        //return $message->created_at;
 
        $lastMessages = Message::where(function($query) use ($request, $message) {
            $query->where('MessageSenderId', Auth::user()->id)
                ->where('MessageReceiverId', $request->to_user)
                ->where('created_at', '<=', $message->created_at)
                ->where('id', '<', $message->id);
        })
            ->orWhere(function ($query) use ($request, $message) {
            $query->where('MessageSenderId', $request->to_user)
                ->where('MessageReceiverId', Auth::user()->id)
                ->where('created_at', '<=', $message->created_at)
                ->where('id', '<', $message->id);
        })->orderBy('id', 'DESC')->get();

            //return $lastMessages;
 
        $return = [];
 
        if($lastMessages->count() > 0) {
 
            foreach ($lastMessages as $message) {
                $message->time = Carbon::parse($message->created_at)->diffForHumans();
                $return[] = view('users/message-line')->with('message', $message)->render();
            }
 
            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }
 
        return response()->json(['state' => 1, 'data' => $return]);
    }
}

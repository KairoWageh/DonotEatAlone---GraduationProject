<?php
namespace App\Http\Controllers;
 
use App\Lib\PusherFactory;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
 
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
        if(!$request->user_id) {
            return;
        }
 
        $messages = Message::where(function($query) use ($request) {
            $query->where('MessageSenderId', Auth::user()->id)->where('MessageReceiverId', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('MessageSenderId', $request->user_id)->where('MessageReceiverId', Auth::user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();
 
        $return = [];

        foreach ($messages as $message) {
            $message->IsRead = 1;
            $message->save(); 
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
 
        broadcast(new MessageSent($user, $message))->toOthers();

        // prepare some data to send with the response
        // $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at));
 
        $message->dateHumanReadable = $message->created_at;
 
        $message->fromUserName = $message->sender->UserName;
 
        $message->from_user_id = Auth::user()->id;
 
        $message->toUserName = $message->receiver->UserName;
 
        $message->to_user_id = $request->MessageReceiverId;

        //return $message;
 
        PusherFactory::make()->trigger('chat', 'send', ['data' => $message]);
 
        return response()->json(['state' => 1, 'data' => $message]);
    }

    /**
     * getOldMessages
     *
     * we will fetch the old messages using the last sent id from the request
     * by querying the created at date
     *
     * @param Request $request
     */
    public function getOldMessages(Request $request)
    {
        if(!$request->old_message_id || !$request->to_user)
            return;
 
        $message = Message::find($request->old_message_id);
 
        $lastMessages = Message::where(function($query) use ($request, $message) {
            $query->where('from_user', Auth::user()->id)
                ->where('to_user', $request->to_user)
                ->where('created_at', '<', $message->created_at);
        })
            ->orWhere(function ($query) use ($request, $message) {
            $query->where('from_user', $request->to_user)
                ->where('to_user', Auth::user()->id)
                ->where('created_at', '<', $message->created_at);
        })
            ->orderBy('created_at', 'ASC')->limit(10)->get();
 
        $return = [];
 
        if($lastMessages->count() > 0) {
 
            foreach ($lastMessages as $message) {
 
                $return[] = view('message-line')->with('message', $message)->render();
            }
 
            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
        }
 
        return response()->json(['state' => 1, 'data' => $return]);
    }
}
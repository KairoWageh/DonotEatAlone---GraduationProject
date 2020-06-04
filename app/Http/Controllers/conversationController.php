<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conversation;
use Illuminate\Support\Facades\Input;


class conversationController extends Controller
{
    protected $table = 'conversations';

    public function getUserConversationById(Request $request ,Message $message ){


         $message->MessageSenderId = $request->user()->id;
          dd($message);


        $conversation=conversation::where('messageId',$request->user()->id)

            ->orderBy('created_at','desc')
            ->get();
        dd($conversation);

        return response(['data'=>$conversation],200);




    }
    public function sendMessage()
    {
        $msg = Input::get('msg');
        $username = Input::get('username');
        $message = new Message();
        $message->sender_username = $username;
        $message->MessageContent = $msg;
        $message->save();
    }

    public function isTyping()
    {
        $username = Input::get('username');
        $conversation = Conversation::find(1);
        if($conversation->sender == $username)
            $conversation->sender_is_typing = true;
        else
            $conversation->receiver_is_typing = true;
        $conversation->save();
    }

    public function notTyping()
    {
        $username = Input::get('username');
        $conversation = Conversation::find(1);
        if($conversation->sender == $username)
            $conversation->sender_is_typing = false;
        else
            $conversation->receiver_is_typing = false;
        $conversation->save();
    }

    public function retrieveConversationMessages()
    {
        $username = Input::get('username');
        $message = Message::where('sender_username', '!=', $username)->where('IsRead', '==', false)->first();

        if(count($message) > 0)
        {
            $message->IsRead = true;
            $message->save();
            return $message->MessageContent;
        }
    }

    public function retrieveTypingStatus()
    {
        $username = Input::get('username');
        $conversation = Conversation::find(1);
        if($conversation->sender == $username)
        {
            if($conversation->receiver_is_typing)
                return $conversation->receiver;
        }
        else
        {
            if($conversation->sender_is_typing)
                return $conversation->sender;
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Conversation extends Model
{
    //
    protected $table ="conversations";

    protected $fillable= [

        'id','MessageId '//,'SenderId','ReceiverId'

    ];

    protected $appends= ['message'/*,'sender','receiver'*/];

    public function getMessageAttribute(){

        return Message::where('MessageId',$this->MessageId)->first();


    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
/*
    public function getSenderAttribute(){

        return User::where('id',$this->SenderId)->first();


    }


    public function getReceiverAttribute(){


        return User::where('id',$this->ReceiverId)->first();

    } **/

}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table ="messages";

    protected $fillable= [

        'MessageSenderId', 'MessageReceiverId', 'MessageContent', 'IsRead'

    ];

    protected $appends= ['sender','receiver'];


    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function getCreatedAtAttribute($value){



        return Carbon::parse($value)->diffForHumans();


    }

    public function getSenderAttribute(){

        return User::where('id',$this->MessageSenderId)->first();


    }


    public function getReceiverAttribute(){


        return User::where('id',$this->MessageReceiverId)->first();

    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

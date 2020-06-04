<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'UserName', 'email', 'UserCity',
        'UserPhone', 'UserPhoto', 'UserBirthDate', 'password',
        'remember_token', 'UserLongitude', 'UserLatitude',
        'Gender','UserInterests','UserJob','UserAge','UserAbout','role',
        'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'UserPassword', 'remember_token',
    ];

    public function messages()
    {
      return $this->hasMany(Message::class);
    }
}

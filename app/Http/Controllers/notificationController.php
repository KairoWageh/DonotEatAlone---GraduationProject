<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Notification;

class notificationController extends Controller
{
    //Carbon::parse($value)->diffForHumans();
    // public function getNotification(Request $request){

    //     $notification=DB::table('notifications')
    //         ->join('users', function ($join) {
    //             $join->on('users.id', '=', 'notifications.NotificationToId1')
    //                 ->oron('users.id', '=', 'notifications.NotificationToId2')  ;
    //         })
    //         ->join('restaurants','restaurants.id','=','NotificationFormId')

    //       //  ->join('users','NotificationToId1','=','users.id')
    //       //  ->join('users','NotificationToId2','=','users.id')
    //         ->select('notifications.*','restaurants.RestaurantName','users.UserName')
    //         ->get();

    //         dd($notification);



    // }

    /**
     * Mark the notification as read.
     *
     * @return void
     */
    public function markAsRead($id)
    {
        $notification = Notification::where('id', $id)->first();
        if (is_null($notification->read_at)) {
            $notification->forceFill(['read_at' => $notification->freshTimestamp()])->save();
        }
        //return back();
    }
}

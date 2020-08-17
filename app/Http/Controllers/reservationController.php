<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Reservation;
use Auth;
use App\invitation;
use App\User;
use App\Restaurant;



use Illuminate\Support\Facades\DB;
use App\Http\Requests;


class reservationController extends Controller
{
    //


    public function getReservations(Request $request){
        $reservation=DB::table('reservations')
            ->join('users','ReservationMakerId','=','users.id')
          //  ->join('users','ReservationMaker2','=','users.id')
            ->join('restaurants','reservations.ReservationRestaurantId','=','restaurants.id')
           // ->where('InvitationReceiverId',Auth::user()->id)
            ->where('ReservationResponse','0')  // the reservation states is still pending not approved or ignored.....
           // ->orderBy('created_at','desc')
            ->select('reservations.*','users.*','restaurants.*')
            ->get();

       //dd($reservation);
        return view('restaurant.reservation',compact('reservation'));


    }




    public function approveReservation( Request $request){

        //the reservation states will be (1) is  approved ..............

        $id= $request['ReservationId'];
        $reservation = Reservation::where('ReservationId', $id)->first();
        $reservation->ReservationResponse = '1';

        $reservation->save();

        ///////   store notification/////////////

        $notification1 = [
            'notifiable_id'        => $reservation->ReservationMakerId,
            'NotificationToId2'    => $reservation->ReservationMaker2,
            'ReservationDate'      => $reservation->ReservationDate,
            'ReservationStartTime' => $reservation->ReservationStartTime,
            'ReservationEndTime'   => $reservation->ReservationEndTime,
            // 'NotificationFormId'   => $reservation->ReservationRestaurantId,
            'notifiable_type'      => '1'
        ];

        $notification2 = [
            'notifiable_id'        =>  $reservation->ReservationMaker2,
            'ReservationDate'      => $reservation->ReservationDate,
            'ReservationStartTime' => $reservation->ReservationStartTime,
            'ReservationEndTime'   => $reservation->ReservationEndTime,
            // 'NotificationFormId'   => $reservation->ReservationRestaurantId,
            'notifiable_type'      => '1'
        ];

        // find restaurant of reservation

        $restaurantID   = $reservation->ReservationRestaurantId;
        $restaurant     = Restaurant::where('id', $restaurantID)->first();
        $restaurantName = $restaurant->RestaurantName;

        // Notification::create($notification1);
        // Notification::create($notification2);

        // notification details
        $details = [
            'greeting'             => 'Hi Artisan',
            // 'body'                 => 'Reservation on '.$reservation->ReservationDate.' from '.$reservation->ReservationStartTime.' to '.$reservation->ReservationEndTime.' has been approved successfully.',
            'body'                 => 'Reservation in '.$restaurantName.' has been approved.',
            'thanks'               => 'Thank you for visiting codechief.org!',
            'ReservationDate'      => $reservation->ReservationDate,
            'ReservationStartTime' => $reservation->ReservationStartTime,
            'ReservationEndTime'   => $reservation->ReservationEndTime,
        ];
        // users to send notificatios to
        $user1 = \App\User::find($reservation->ReservationMakerId);
        $user2 = \App\User::find($reservation->ReservationMaker2);

        // send notifications to users
        $user1->notify(new \App\Notifications\ReservationComplete($details));
        $user2->notify(new \App\Notifications\ReservationComplete($details));

        return back()->with('success', __('site.approvedSuccessfully'));
    }


    public function rejectReservation(Request $request){
        //the reservation states will be (2 ) is  ignored ..............
        $id= $request['ReservationId'];
        $reservation = Reservation::where('ReservationId',$id)->first();
        $reservation->ReservationResponse = '2' ;

        $reservation->save();

        return back()->with('success', __('site.rejectedSuccessfully'));;




    }



}
